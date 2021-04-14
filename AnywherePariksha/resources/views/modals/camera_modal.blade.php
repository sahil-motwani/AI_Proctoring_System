<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="camera"></div>
                <input class="btn btn-sm btn-primary" type="button" value="Take Picture" id="btPic"
                       onclick="takeSnapShot()" />
                <button class="btn btn-sm btn-primary" onclick="clearImage()">Reset</button>
                <div id="results" ></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Begin Test</button>
            </div>
        </div>
    </div>
</div>
