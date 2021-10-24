@extends('layouts.admin')

@section('content')
    <div class="flex flex-col">
        {{--page header--}}
        <div class="flex items-center justify-between bg-gray-50 border-b border-gray-100 p-4">
            <h1 class="text-3xl font-semibold">New Transaction</h1>
            <a href="{{ URL::previous() }}" class="px-4 py-2 rounded-lg text-gray-500 hover:text-gray-800 hover:bg-gray-200 hover:shadow-xl flex items-center space-x-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="">Back</span>
            </a>
        </div>

        {{--form--}}
        <form action="{{ route('admin.transaction.store') }}" method="post" class="flex flex-col space-y-8 p-12 m-6 w-3/4 border rounded-lg mt-12">
            @csrf

            <div class="flex space-x-8">
                <div class="flex flex-col w-full">
                    <label for="transaction_name" class="flex justify-between w-full">
                        <span class="input-label">Transaction Name</span>
                        @if ($errors->has('transaction_name'))
                            <span class="input-error">{{ $errors->first('transaction_name') }}</span>
                        @endif
                    </label>
                    <input type="text" name="transaction_name" id="transaction_name" class="input-text" value="{{ old('transaction_name') }}">
                </div>
            </div>

            <div class="flex space-x-8">
                <div class="flex flex-col w-full">
                    <label for="student_id" class="flex justify-between w-full">
                        <span class="input-label">Student</span>
                        @if ($errors->has('student_id'))
                            <span class="input-error">{{ $errors->first('student_id') }}</span>
                        @endif
                    </label>
                    <select name="student_id" id="student_id">
                        <option selected value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex space-x-8">
                <div class="flex flex-col w-full">
                    <label for="transaction_date" class="flex justify-between w-full">
                        <span class="input-label">Transaction Date</span>
                        @if ($errors->has('transaction_date'))
                            <span class="input-error">{{ $errors->first('transaction_date') }}</span>
                        @endif
                    </label>
                    <input type="date" name="transaction_date" id="transaction_date" class="input-text" value="{{ old('transaction_date') }}">
                </div>
            </div>

            <div class="flex space-x-2 items-center justify-end">
                <a href="{{ URL::previous() }}" type="button"
                    class="border border-gray-700 text-gray-700 rounded-md px-4 py-2 m-2 transition ease select-none hover:text-white hover:bg-gray-800 focus:outline-none focus:shadow-outline">
                    Cancel
                </a>
                <button type="submit"
                    class="border border-green-500 text-green-500 rounded-md px-4 py-2 m-2 transition ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline">
                    Create
                </button>
            </div>

        </form>

    </div>
@endsection
