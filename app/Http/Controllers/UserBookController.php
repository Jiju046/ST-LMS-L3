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
        ], [
            'date.required' => 'Please select a date',
            'selected_books.required' => 'Please select at least one available book!'
        ]);

        if ($validator->fails()) {
            return redirect()->route('booking.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the selected books are already booked for the chosen date
        $date = $request->input('date');
        $selectedBooks = $request->input('selected_books');
        $conflictingBooks = UserBook::where('date', $date)
            ->whereIn('book_id', $selectedBooks)
            ->where('approved', 1)
            ->get();

        // $bookNames = $conflictingBooks->pluck('book.title')->unique()->implode(', ');

        if (!$conflictingBooks->isEmpty()) {
            return redirect()->route('booking.index')
                    ->with('error', ' Some of the books are already booked');
        }

        // Store user's selected books for admin approval
        $userId = Auth::id();

        foreach ($selectedBooks as $bookId) {
            UserBook::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'date' => $date,
                'approved' => null, // Set initial status to null
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

        // Check if the book is already approved for another user on same date
        $existingApproval = UserBook::where('book_id', $booking->book_id)
            ->where('approved', true)
            ->where('date', '=', $booking->date) // Check if the dates are same
            ->where('id', '!=', $id) //except this id
            ->exists();

            if ($existingApproval && $status === "decline") {
                $booking->approved = false;
                $booking->save();
            } elseif ($existingApproval) {
                // Book is already approved for another user
                return response()->json(['success' => false]);
            }

        $booking->approved = ($status === 'approve');
        $booking->save();

        return response()->json(['success' => true]);
    }


    // booking available books
    public function getAvailableBooks(Request $request)
    {

        $selectedDate = $request->input('date');
        
        // Convert the selected date to a day of the week
        $selectedDay = date('l', strtotime($selectedDate));

        // Query the database to retrieve books available on the selected day
        $availableBooks = Book::whereRaw("FIND_IN_SET('$selectedDay', available_days)")->get();

        return response()->json($availableBooks);

    }
}