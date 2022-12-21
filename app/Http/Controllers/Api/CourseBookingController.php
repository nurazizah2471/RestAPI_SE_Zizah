<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseBookingResource;
use App\Models\Course;
use App\Models\CourseBooking;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CourseBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->user_type == 'Pengurus Panti') {
            return ['result' => CourseBookingResource::collection(CourseBooking::where('orphanage_id', auth()->user()->orphanage->id)->get())];
        } elseif (auth()->user()->user_type == 'Tutor') {
            return ['result' => CourseBookingResource::collection(auth()->user()->tutor->courses->courseBookings)];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->money >= Course::find($request->course_id)->price_sum) {
            $courseBooking = Course::find($request->course_id)->courseBookings()->create([
                'orphanage_id' => auth()->user()->orphanage->id,
                'status' => 'pending',
                'member_sum' => $request->member_sum,
            ]);

            if ($courseBooking) {
                $courseBooking->transaction_id = Transaction::create([
                    'user_id' => $courseBooking->orphanage->user->id,
                    'amount' => $courseBooking->course->price_sum,
                    'status' => 'pending',
                    'description' => 'Pembayaran kursus oleh '.$courseBooking->orphanage->name,
                    'to_user_id' => $courseBooking->course->tutor->user->id,
                ])->id;
                $courseBooking->save();
            }

            $payment = $courseBooking->orphanage->user->update([
                'money' => $courseBooking->orphanage->user->money - $courseBooking->course->price_sum,
            ]);

            if ($payment) {
                return ['status' => 'Reservasi kursus berhasil!'];
            } else {
                return [
                    'status' => 'Mohon maaf, sistem sedang erorr!',
                ];
            }
        } else {
            return [
                'status' => 'Mohon maaf, saldo anda tidak cukup!',
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ['result' => CourseBookingResource::collection(CourseBooking::where('id', $id)->get())];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function cancel($id)
    {
        $courseBooking = CourseBooking::find($id)->update([
            'status' => 'canceled',
        ]);

        if ($courseBooking) {
            $courseBooking->transaction->update([
                'status' => 'canceled',
            ]);
        }

        $payment = $courseBooking->orphanage->user->update([
            'money' => $courseBooking->orphanage->user->money + $courseBooking->course->price_sum,
        ]);

        if ($payment) {
            return ['status' => 'Reservasi berhasil dibatalkan!'];
        } else {
            return [
                'status' => 'Mohon maaf, sistem sedang erorr!',
            ];
        }
    }

    public function approve($id)
    {
        $courseBooking = CourseBooking::find($id)->update([
            'status' => 'ongoing',
        ]);

        if ($courseBooking) {
            return ['status' => 'Reservasi berhasil disetujui!'];
        } else {
            return [
                'status' => 'Mohon maaf, sistem sedang erorr!',
            ];
        }
    }

    public function complete($id)
    {
        $courseBooking = CourseBooking::find($id)->update([
            'status' => 'complete',
        ]);

        if ($courseBooking) {
            $courseBooking->transaction->update([
                'status' => 'complete',
            ]);
        }

        $payment = $courseBooking->course->tutor->user->update([
            'money' => $courseBooking->course->tutor->user->money + $courseBooking->transaction->amount,
        ]);

        if ($payment) {
            return ['status' => 'Reservasi berhasil diakhiri!'];
        } else {
            return [
                'status' => 'Mohon maaf, sistem sedang erorr!',
            ];
        }
    }
}
