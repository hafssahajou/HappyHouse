<!-- This is an example component -->
<div class="max-w-2xl mx-auto">
    
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>

    <p class="mt-5">This card component is part of a larger, open-source library of Tailwind CSS components. Learn more by going to the official <a class="text-blue-600 hover:underline" href="#" target="_blank">Flowbite Documentation</a>.</p>
</div>
src="{{asset('images/' . $annonce->image) }}"



<div class="grid mt-5 w-full sm:grid-cols-2 xl:grid-cols-5 gap-6">
        <!-- Card -->
        
            <div
                class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
               
                <div
                    class="hover:text-blue-600 text-white text-sm absolute z-30 top-0 right-0 mt-2 mr-3 gap-1 flex items-center">
                  
                </div>
                <div class="h-auto overflow-hidden">
                    <div class="h-44 overflow-hidden relative">
                        <img src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
                    </div>
                </div>
                <div class="bg-white py-4 px-3">
                    <div class="flex items-center justify-between gap-0.5">
                        <h3 class="text-sm mb-2 font-medium">{{$annonce->title}}</h3>
                        <div class="flex items-center gap-1">
                            <form action="" method="post">
                            
                                <input type="hidden" name="event" value="">
                                <button type="submit" class="py-0.5 px-1.5 block text-white rounded-md bg-green-500">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </form>
                            <form action="" method="post">
                               
                                <input type="hidden" name="event" value="">
                                <button type="submit" class="py-0.5 px-1.5 block text-white rounded-md bg-red-500">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-m text-nowrap text-ellipsis	overflow-hidden mb-2 text-gray-400">
                        {{$annonce->description}}
                        </p>
                    </div>
                    <div>
                        <span class="text-lg font-medium mb-2 block">{{$annonce->location}}</span>
                    </div>
                 
                </div>
            </div>
       

    </div>
</div>

