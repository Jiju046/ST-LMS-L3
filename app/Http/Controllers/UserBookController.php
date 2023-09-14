<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserBookController extends Controller
{   
    // booking view
    public function booking(Request $request)
    {
        $date = $request->input('date');
        $selectedDay = date('l', strtotime($date));

        // Retrieve books that are available on the selected day
        $availableBooks = Book::whereRaw("FIND_IN_SET('$selectedDay', available_days)")
            ->get();

        return view('booking.index', compact('availableBooks', 'date'));
    }

    // booking details view
    public function bookingDetails()
    {
        $bookings = UserBook::with('user', 'book')->get();

        return view('booking-details.index', compact('bookings'));
    }

    // booking store
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'selected_books' => 'required|array',
            'selected_books.*' => 'integer',
        ],[
            'date.required' => 'Please select a date',
            'selected_books.required' => 'Please select atleast one available book!'
        ]);

        if ($validator->fails()) {
            return redirect()->route('booking.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Store user's selected books for admin approval
        $userId = Auth::id();
        $date = $request->input('date');
        $selectedBooks = $request->input('selected_books');

        foreach ($selectedBooks as $bookId) {
            UserBook::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'date' => $date,
                'approved' => null, // Set initial status to not null
            ]);
        }

        return redirect()->route('booking.index')
            ->with('success', 'Your selections have been submitted for approval.');
    }

    // approve
    public function bookingStatus(Request $request)
    {
        
        $status = $request->input('status'); // Retrieve 'status' from the POST data
        $id = $request->input('id');
        $booking = UserBook::findOrFail($id);

        $booking->approved = ($status === 'approve');
        $booking->save();

        $message = $booking->approved ? 'Booking approved.' : 'Booking declined';

        return response()->json(['success' => true, 'message' => $message]);
    }


    // booking available books
    public function getAvailableBooks(Request $request)
    {
        // Get the selected date from the request
        $selectedDate = $request->input('date');
        
        // Convert the selected date to a day of the week (e.g., "Sunday")
        $selectedDay = date('l', strtotime($selectedDate));

        // Query the database to retrieve books available on the selected day
        $availableBooks = Book::whereRaw("FIND_IN_SET('$selectedDay', available_days)")->get();

        return response()->json($availableBooks);

    }
}