
<!DOCTYPE html>
<html>
<head>
    <style>
    .center2 {
              display: block;
              margin-left: 125;
            }
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: purple;
      color: white;
      text-align: center;
    }

    .header {
      position: fixed;
      width: 100%;
      background-color: purple;
      color: white;
      text-align: center;
    }


<title>Poster</title>

</head>




<body>
    @foreach($post as $post)

    <div class="header">
        <h1 font-size: 28;"> Property Listing For: {{ $post->name }} </h1>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>

    <table>
        <tbody>

            <tr>
                <td>
                    <img class="img_deg" src="postimage/{{ $post->image }}" style="width:700px; height:250px;">
                </td>
            </tr>
        </tbody>
   </table>

    <br/>
    <p style="font-size: 15; margin-left: 40; margin-right: 40;"> ADDRESS: {{ $post->address }} </p>
    <p style="font-size: 15; margin-left: 40; margin-right: 40;"> REGION: {{ $post->region }} </p>
    <br/>
    <br/>

    <table>
        <tbody>

            <tr>
                <td>
                    <img src="data:image/png;base64, {!! base64_encode($img) !!}" width="350" height="350" class="center2">
                </td>
            </tr>

        </tbody>



        <div class="footer">
          <p>Hosted by {{$site}}</p>
          <p>Generated on {{ $date }}</p>
        </div>

    </table>

    @endforeach

</body>
</html>
