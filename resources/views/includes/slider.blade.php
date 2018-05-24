<header class="m-t-b">
	<div id="jssor_1">
	  <!-- Loading Screen -->
	  <div data-u="loading" class="jssorl-009-spin">
	      <img class="jssor-img" src="vendor/slider/img/spin.svg" />
	  </div>
	  <div data-u="slides" class="jssor-slides">
		  @foreach($categories as $category)
		    @if($category->products->count() > 0)
		  <div data-p="170.00">
		    <img data-u="image" src="img/large/{{ $category->products[$category->products->count()-1]->img }}" />
		    <div data-u="caption" data-t="0" class="jssor-caption-0">
		      {{ $category->products[$category->products->count()-1]->name }}
		    </div>
		  </div>
		    @endif
		  @endforeach
	  </div>
	  <!-- Bullet Navigator -->
	  <div data-u="navigator" class="jssorb052" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
	    <div data-u="prototype" class="i jssor">
	      <svg viewbox="0 0 16000 16000" class="jssor-sgv">
	        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
	      </svg>
	    </div>
	  </div>
	  <!-- Arrow Navigator -->
	  <div data-u="arrowleft" class="jssora053 jssora053-left" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
	    <svg viewbox="0 0 16000 16000" class="jssor-sgv">
	      <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
	    </svg>
	  </div>
	  <div data-u="arrowright" class="jssora053 jssora053-right" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
	    <svg viewbox="0 0 16000 16000"  class="jssor-sgv">
	      <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
	    </svg>
	  </div>
	</div>
	<!-- //slider -->
</header>