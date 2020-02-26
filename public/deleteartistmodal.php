<div class="modal fade" id="delete<?php echo $row['uuid']?>" tabindex="-1" role="dialog" aria-labelledby="deleteArtistModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteArtistModal">Confirming Removal.</h4>
                <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
            <button id="confirmdelete" class="btn rmva-btn" name="uuid" value="<?php echo $row['uuid'] ;?>" data-dismiss="modal">Yes, remove.</button>

            <button class="btn" data-dismiss="modal">No, do not remove.</button>
            </div>


            </div>
        </div>
    </div>


