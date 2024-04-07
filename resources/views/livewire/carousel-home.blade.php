<div>
    <div class="md:py-8 md:px-6 md:mb-4">
        <div class="glider-contain pt-4">
            <div class="glider-carousel flex items-center">
              {{-- <div class="flex items-center justify-center">
                <img  class=" object-center object-cover" src="{{asset('img/tienda.jpg')}}" alt="">
              </div> --}}
              @foreach ($banners as $banner)
                    <div class="flex items-center justify-center">
                        <img class="object-center object-cover" src="{{ Storage::url($banner['image']) }}" alt="{{ $banner['name'] }}">
                    </div>
                @endforeach
              {{-- <div class="flex items-center justify-center">
                <img  class=" object-center object-cover" src="{{asset('img/new.jpg')}}" alt="">
              </div>
              <div class="flex items-center justify-center">
                <img  class=" object-center object-cover" src="{{asset('img/day.jpg')}}" alt="">
              </div> --}}
              
            </div>
          
            <button aria-label="Previous" class="hidden md:block glider-prev mt-8">
              <span class="bg-orange-600 text-white rounded-full h-10 w-10 flex items-center justify-center text-xl ">
                  <i class="fas fa-angle-left hvr-icon"></i>
              </span>
          </button>
          <button aria-label="Next" class="hidden md:block glider-next mt-8">
              <span class="bg-orange-600 text-white rounded-full h-10 w-10 flex items-center justify-center text-xl ">
                  <i class="fas fa-angle-right hvr-icon"></i>
              </span>

          </button>
            {{-- <div role="tablist" class="dots hidden md:block"></div> --}}
          </div>
    </div>
</div>
