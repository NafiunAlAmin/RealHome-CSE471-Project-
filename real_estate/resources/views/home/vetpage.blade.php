<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Vet Contact Information 𓃠</h1>
            <p class="services_text"> 🐾 Choose a veterinarian most suitable for you and your furry friend 🐾 </p>
            <div class="services_section_2">
               <div class="row">
                  @foreach($post as $post)
                  <div class="col-md-6">
                     <div><img src="/vet_image/{{$post->image}}" class="services_img"></div>
                     <h4>{{$post->id}}</h4>
                     <p>Vet Name: <b>{{$post->name}}</b></p>
                     <p>Contact Information: <b>{{$post->contact}}</b></p>
                     <p>Located in: <b>{{$post->locality}}</b></p>
                     <p>Address: <b>{{$post->address}}</b></p>
                  </div>
                  @endforeach
                   
               </div>
            </div>
         </div>
      </div>