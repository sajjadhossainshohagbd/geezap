@extends('v2.layouts.app')
@section('content')
    <!-- Header Section -->
    <header class="bg-[#12122b] border-b border-gray-800 py-6">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-3xl font-oxanium-semibold text-white">Browse Job Categories</h1>
            <p class="text-gray-300 font-ubuntu-regular">Explore a wide range of specialized categories to find the role that best suits your skills.</p>
        </div>
    </header>

    <!-- Categories Grid Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            @if($jobCategories->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-300 font-ubuntu-regular">No categories found</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($jobCategories as $category)
                        <div class="group bg-[#1a1a3a] p-6 rounded-2xl border border-gray-700 hover:border-pink-500/50 transition">
                            <a href="{{ url('jobs?category=' . $category->job_category) }}" class="flex flex-col items-start text-left font-ubuntu-regular">
                                <div class="w-14 h-14 bg-pink-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-pink-500/20">
                                    @if($category->category_image)
                                        <img src="{{ $category->category_image }}" alt="{{ $category->job_category }}" class="w-8 h-8 object-contain">
                                    @else
                                        <i class="las la-briefcase text-2xl text-pink-300"></i>
                                    @endif
                                </div>
                                <h3 class="text-xl font-semibold font-oxanium-semibold text-white mb-2">
                                    {{ ucwords($category->job_category) }}
                                </h3>
                                <p class="text-gray-300">
                                    {{ $category->total_jobs }} {{ Str::plural('position', $category->total_jobs) }}
                                </p>
                                @if($category->country)
                                    <span class="text-sm text-gray-400 mt-2">
                                        <i class="las la-map-marker"></i> {{ $category->country }}
                                    </span>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
