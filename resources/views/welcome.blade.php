@extends('layouts.frontend-app')
@section('content')
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12 space-y-3 space-x-auto">
            <div class="w-full my-2 font-bold leading-tight text-gray-800 flex flex-row justify-between">
                <h2 class="order-first text-3xl">Feedback List</h2>
                <a href="{{ route('create-feedback') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-1xl">Create
                    Feedback </a>
            </div>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            @forelse ($feedbacks as $feedback)
                <div
                    class="sm:w-96 md:w-1/3 p-6 flex flex-col flex-shrink pb-4 bg-gradient-to-tr from-slate-50 text-white  rounded-2xl shadow hover:shadow-md transition">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-black">{{ Str::ucfirst($feedback->title) }}</h3>
                        <p class="font-serif text-slate-400">{{ $feedback->category }}</p>
                    </div>
                    <footer class="flex gap-2 px-4 flex-row justify-between">
                        <div>
                            <button data-id={{ $feedback->id }} class="text-blue-400 btn-vote hover:text-red-400">
                                <i class="fa-solid fa-thumbs-up"></i>
                                <span>{{ $feedback->votes->count() }}</span>
                            </button>
                            <a href="{{ route('comment-feedback', $feedback) }}" class="text-blue-400 hover:text-red-400">
                                <i class="fa-solid fa-comment"></i>
                            </a>
                        </div>
                        <p class="order-last text-blue-500">{{ $feedback->user->name }}</p>
                    </footer>
                </div>
            @empty
            @endforelse

        </div>
        {{-- Pagination --}}
        <div class="container mx-auto pt-4 pb-12">
            <nav aria-label="Page navigation example">
                {{ $feedbacks->links() }}
                <ul class="inline-flex -space-x-px text-base h-10">
                </ul>
            </nav>
        </div>
    </section>
@endsection
@section('my-script')
    <script>
        jQuery(document).ready(function($) {

            $(".btn-vote").click(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var feedback = $(this).attr("data-id");
                var type = "POST";
                var ajaxurl = 'vote';
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: {feedback_id : feedback},
                    dataType: 'json',
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });
        });
    </script>
@endsection
