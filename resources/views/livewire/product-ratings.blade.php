<div>
    <section class="relative shadow-sm block pb-24 overflow-hidden rounded-lg text-left bg-white mt-1">
        <div class="w-full px-4 mx-auto text-left">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-3 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-2xl font-bold text-indigo-900">
                        Ratings
                    </h2>
                </div>
            </div>
            <div class="box-border flex grid flex-wrap -mx-4 text-center text-indigo-900 lg:gap-16 lg:justify-start lg:text-left">
                @forelse ($comments as $comment)
                    <div class="flex col-span-1">
                        <div class="relative flex-shrink-0 w-20 h-20 text-left">
                            <a href="{{ '@' . $comment->user->name }}">
                            </a>
                        </div>
                        <div class="relative px-4 mb-16 leading-6 text-left">
                            <div class="box-border text-lg font-medium text-gray-600">
                                {{ $comment->comment }}
                            </div>
                            <div class="box-border mt-0 text-lg font-semibold text-indigo-900 uppercase">
                                Rating: <strong>{{ $comment->rating }}</strong> ⭐
                                @auth
                                    @if(auth()->user()->id == $comment->user_id)
                                        - <a wire:click.prevent="delete({{ $comment->id }})" class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                @endauth
                            </div>
                            <div class="box-border text-left text-gray-700" style="quotes: auto;">
                                <a href="{{ '@' . $comment->user->username }}">
                                    {{  $comment->user->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            No ratings
                        </div>
                    </div>
                </div>
                @endforelse

            </div>
    </section>

    <section class="mt-2">
        <div class="">
            <div class="">

                <div class="w-full md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-sm px-7">
                        @auth
                            <div class="w-full space-y-5">
                                <p class="font-medium text-blue-500 uppercase">
                                    Rate this product
                                </p>
                            </div>
                            @if (session()->has('message'))
                            <div class="toast-container position-fixed top-auto end-0 p-3">
                                <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
                                        <strong class="me-auto">GoodFance Bag</strong>
                                        {{-- <small>11 mins ago</small> --}}
                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body bg-white rounded">
                                        {{ session('message') }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($hideForm != true)
                                <form wire:submit.prevent="rate()">
                                    <div class="block px-1 pt-2">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1">
                                                <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 1 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star2">
                                                <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 2 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star3">
                                                <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 3 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star4">
                                                <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 4 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star5">
                                                <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 5 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                        </div>
                                        <div class="my-3">
                                            @error('comment')
                                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                            <textarea wire:model.lazy="comment" name="description" class="block w-full px-3 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="w-full px-3 py-2 font-medium text-white bg-blue-600 rounded-lg">Rate</button>
                                        @auth
                                            @if($currentId)
                                                <button type="submit" class="w-full px-3 py-2 mt-2 font-medium text-white bg-red-400 rounded-lg" wire:click.prevent="delete({{ $currentId }})" class="text-sm cursor-pointer">Delete</button>
                                            @endif
                                        @endauth
                                    </div>
                                </form>
                            @endif
                        @else
                            <div>
                                <div class="mb-8 text-center text-gray-600">
                                    You need to login in order to be able to rate the product!
                                </div>
                                <a href="/register"
                                    class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100" 
                                >Register</a>
                            </div>
                        @endauth
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    
</div>