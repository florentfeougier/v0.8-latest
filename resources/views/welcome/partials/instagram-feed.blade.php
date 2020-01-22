
<!-- Instagram -->
<section class="instagram pt-4">
  <div class="sec-title pb-4 px-2">
    <h3 class="m-text5 t-center">
    <span>SUIVEZ-NOUS SUR</span>
    <a href="https://instagram.com/plantesaddict" class="text-black font-2b fontsize-6 ml-2">
      <i class="fa-2xl fa fa-instagram"></i>
      INSTAGRAM</a>
    </h3>
  </div>

  <div class="flex-w">
    <!-- Block4 -->


    @foreach($instagram as $post)
    <div class="block4 wrap-pic-w">
      <img src="{{$post->images->low_resolution->url}}" alt="Nos derniers posts">

      <a href="{{$post->link}}" target="_blank" class="block4-overlay sizefull ab-t-l trans-0-4">
        <span class="block4-overlay-heart p-2 flex-m trans-0-4 p-l-40 p-t-25">
          <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
          <span class="p-t-2 text-white">{{$post->likes->count}} 👍 </span>
        </span>

        <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
          <p class="p-3 m-b-15 h-size1 of-hidden">
              {{$post->caption->text}}
          </p>

          <span class="p-2 text-center text-white">
             <img src="{{asset("storage/icons/instagram.svg")}}" height="20px" alt="Likes">
          </span>
        </div>
      </a>
    </div>

  @endforeach





  </div>
</section>
