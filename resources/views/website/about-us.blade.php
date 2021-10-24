@extends('layouts.website')

@section('content')
<section class="relative py-24">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center">
            <div class="w-10/12 md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-78">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-500">
                    <img alt="..." src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=700&amp;q=80" class="w-full align-middle rounded-t-lg">
                    <blockquote class="p-8 mb-4">
                        <h4 class="text-xl font-bold text-white">
                            College management system
                        </h4>
                        <p class="text-md font-light mt-2 text-white">
                            The college management system contains features to enable college administrators to add courses, add subjects to them, add students and instructors and assign classes to them, manage schedules and transactions of the users.
                        </p>
                    </blockquote>
                </div>
            </div>

            <div class="w-full md:w-6/12 px-4">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-6/12 px-4">
                        <div class="relative flex flex-col mt-4">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-gray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h6 class="text-xl mb-1 font-semibold">Admin Management</h6>
                                <p class="mb-4 text-gray-500">
                                    Admin management contains features to manage the system it includes funtions to schedule classes, add students, instructors, manage transactions courses and more.
                                </p>
                            </div>
                        </div>
                        <div class="relative flex flex-col min-w-0">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-gray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </div>
                                <h6 class="text-xl mb-1 font-semibold">
                                    Instructors
                                </h6>
                                <p class="mb-4 text-gray-500">
                                    Instructors can login to see the classes they have for the day and a schedule of assigned classes, they can also update their profile and password after logging in.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-6/12 px-4">
                        <div class="relative flex flex-col min-w-0 mt-4">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-gray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 511.989 511.989" class="h-5 w-5 group-hover:text-red-600" stroke-width="4%" stroke="currentColor" fill="currentColor"><path d="m470.994 330c0-24.146-17.205-44.348-40-48.994v-54.006c0-4.92-2.412-9.526-6.456-12.329s-9.206-3.445-13.811-1.716l-28.629 10.736c-18.8-19.545-41.652-34.266-66.694-43.303 24.608-18.234 40.59-47.478 40.59-80.388 0-55.141-44.859-100-100-100s-100 44.859-100 100c0 32.91 15.982 62.154 40.59 80.388-25.043 9.038-47.894 23.759-66.694 43.303l-28.629-10.736c-4.606-1.729-9.768-1.087-13.811 1.716-4.044 2.803-6.456 7.409-6.456 12.329v54.006c-22.795 4.646-40 24.847-40 48.994s17.205 44.348 40 48.994v58.006c0 6.253 3.879 11.85 9.733 14.045l160 60c3.374 1.258 7.159 1.258 10.533 0l160-60c5.854-2.195 9.733-7.792 9.733-14.045v-58.006c22.796-4.646 40.001-24.848 40.001-48.994zm-285-230c0-38.598 31.402-70 70-70s70 31.402 70 70-31.402 70-70 70-70-31.402-70-70zm70 100c35.143 0 68.709 12.701 94.899 35.393l-94.899 35.587-94.899-35.587c26.191-22.692 59.757-35.393 94.899-35.393zm-185 130c0-11.028 8.972-20 20-20h10v40h-10c-11.028 0-20-8.972-20-20zm40 49.497c11.397-2.323 20-12.424 20-24.497v-50c0-12.073-8.603-22.174-20-24.497v-31.858l130 48.75v177.961l-130-48.75zm160 95.858v-177.96l130-48.75v31.858c-11.397 2.323-20 12.424-20 24.497v50c0 12.073 8.603 22.174 20 24.497v47.108zm150-125.355h-10v-40h10c11.028 0 20 8.972 20 20s-8.971 20-20 20z"/></svg>
                                </div>
                                <h6 class="text-xl mb-1 font-semibold">Students</h6>
                                <p class="mb-4 text-gray-500">
                                    Students are able to view their classes, the days classes and transactions after logging in. Students can also update their profile or change the account password after logging in.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
