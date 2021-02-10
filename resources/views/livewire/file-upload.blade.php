<div>
    {{-- The Master doesn't talk, he acts. --}}
    
    <form wire:submit.prevent="save">
        <button id="btnfile"> 
        @if($photo)
        <div class="row">
            <div class="content rounded-circle img-thumbnail">
              <div class="content-overlay"></div>
              <img src="{{$photo->temporaryUrl()}}"  class="rounded-circle shadow-sm  img-thumbnail img-fluid imgsize">
              <div class="content-details fadeIn-bottom">
                  <p class="content-text"><i class="fa fa-upload"></i> Upload Photo</p>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Save Photo</button>
        @else
          <div class="row">
            <div class="content rounded-circle img-thumbnail d-flex justify-content-center">
              <div class="content-overlay"></div>
              <img src="https://lh3.googleusercontent.com/proxy/j2eGnCWLhsMeLm8Hcn3of3ExBrPieP3lvI4qzASVHd-VPP9XaEas1D4nVBJ-wmzUJ9UjsQ7dRoTspvNz9a9H4xKlq0BJntBc8-AG12jcWI4Fp8i8oK9xnlKNhOB2SUVG40E"  class="rounded-circle shadow-sm  img-thumbnail img-fluid imgsize">
              <!-- <img src="{{$photo_exists ? url('storage/'.$photo_path) : url('storage/photos/IHoYLyrAkh6SA5mfz6hnEYfxWp7lD4Ua1j7eDiEb.png')}}"  class="rounded-circle shadow-sm  img-thumbnail img-fluid imgsize"> -->
              <div class="content-details fadeIn-bottom">
                  <p class="content-text"><i class="fa fa-upload"></i> Upload Photo</p>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary invisible">Save Photo</button>
        @endif
        </button> 
        <div class="wrapper">
            <input type="file" id="uploadfile" wire:model="photo" hidden/> 
        </div>
        <!-- @error('photo') <span class="error ">{{ $message }}</span> @enderror -->
    </form>
</div>  

<script>
  $("#btnfile").click(function () {
    $("#uploadfile").click();
  });
</script>

