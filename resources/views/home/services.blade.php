<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Daily Updates </h1>
            <p class="services_text">Share your daily Pet stories or read from us for daily updates</p>
            <div class="services_section_2">
               <div class="row">
                  @foreach($post as $post)
                  <div class="col-md-4">
                     <div><img src="/postimage/{{$post->image}}" class="services_img"></div>
                     <h4>{{$post->id}}</h4>
                     <p>Post by <b>{{$post->name}}</b></p>
                     <div class="btn_main"><a href="{{url('post_details',$post->id)}}">Read</a></div>
                  </div>
                  @endforeach
                   
               </div>
            </div>
         </div>
      </div>