<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
  <title>templates</title>
  <link rel="stylesheet" href="/css/libs/animate.css">
  <link rel="stylesheet" href="/css/libs/magnific-popup.css">
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="main">
    <div class="form-wrap">
      <ul class="add-photo">
        @if(!empty($fixed_situation->file1))
        <li class="photo_edit"><img src="/newSituations/{{ $fixed_situation->file1 }}" alt="" id="image1"><span>До</span></li>
        @elseif(!empty($fixed_situation->file2))
        <li class="photo_edit"><img src="/newSituations/{{ $fixed_situation->file2 }}" alt="" id="image1"><span>До</span></li>
        @elseif(!empty($fixed_situation->file3))
        <li class="photo_edit"><img src="/newSituations/{{ $fixed_situation->file3 }}" alt="" id="image1"><span>До</span></li>
        @endif


        @if(!empty($fixed_situation->fixed_file1))
        <li class="photo_edit"><img src="/fixedSituations/{{ $fixed_situation->fixed_file1 }}" alt="" id="image2"><span>После</span></li>
        
        @elseif(!empty($fixed_situation->fixed_file2))
        <li class="photo_edit"><img src="/fixedSituations/{{ $fixed_situation->fixed_file2 }}" alt="" id="image2"><span>После</span></li>
        @elseif(!empty($fixed_situation->fixed_file3))
        <li class="photo_edit"><img src="/fixedSituations/{{ $fixed_situation->fixed_file3 }}" alt="" id="image2"><span>После</span></li>
        @endif
      </ul>
      <br>
      <br>
      <ul class="photo_slider1">
        @if(!empty($fixed_situation->file1))
        <li class="photo_s_show"><img src="/newSituations/{{ $fixed_situation->file1 }}" alt="">
          @endif
          @if(!empty($fixed_situation->file2))
          <li class="photo_s_show"><img src="/newSituations/{{ $fixed_situation->file2 }}" alt="">
            @endif
            @if(!empty($fixed_situation->file3))
            <li class="photo_s_show"><img src="/newSituations/{{ $fixed_situation->file3 }}" alt="">
              @endif
      <!-- <li class="photo_s_show"><img src="/img/img1.jpg" alt=""></li>
      <li class="photo_s_show"><img src="/img/img2.jpg" alt=""></li>
      <li class="photo_s_show"><img src="/img/img3.jpg" alt=""></li> -->
    </ul>
    <ul class="photo_slider2">
      @if(!empty($fixed_situation->fixed_file1))
      <li class="photo_s_show"><img src="/fixedSituations/{{ $fixed_situation->fixed_file1 }}" alt=""></li>
      @endif
      @if(!empty($fixed_situation->fixed_file2))
      <li class="photo_s_show"><img src="/fixedSituations/{{ $fixed_situation->fixed_file2 }}" alt=""></li>
      @endif
      @if(!empty($fixed_situation->fixed_file3))
      <li class="photo_s_show"><img src="/fixedSituations/{{ $fixed_situation->fixed_file3 }}" alt=""></li>
      @endif
     <!--  <li class="photo_s_show"><img src="/img/img5.jpg" alt=""></li>
     <li class="photo_s_show"><img src="/img/img6.jpg" alt=""></li> -->
   </ul>
   <p style="color:#023351; font-weight: 700;">Исправлено: </p><p>{{ $fixed_situation->works }}</p>
 </div>
</div>
<script src="/js/libs/jquery-3.1.1.min.js"></script>
<script src="libs/prefixfree.min.js"></script>
<script src="libs/jquery.magnific-popup.min.js"></script>
<script src="libs/jquery.viewportchecker.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/slider.js"></script>
</body>
</html>