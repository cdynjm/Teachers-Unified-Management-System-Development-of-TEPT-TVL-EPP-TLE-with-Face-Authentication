<!-- The Modal -->
<div class="modal fade" id="face-auth-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Face Authentication</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        
            <div class="modal-body">

                <div id="loading-notice" class="alert alert-danger text-sm" style="display: none; text-align: center; padding: 10px; background: #f0f0f0; border-radius: 5px;">
                    Please wait, loading face recognition models...
                </div>

               <video class="img-fluid"  id="video" width="750" height="560" autoplay muted></video>
               <canvas class="img-fluid" id="overlay" style="position: absolute; top: 20px; left: 25px; right: 0; bottom: 0"></canvas>
            </div>
        </div>
    </div>
</div> 

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = document.getElementById('face-auth-modal');
        modal.addEventListener('hidden.bs.modal', function () {
            location.reload();
        });
    });
</script>
