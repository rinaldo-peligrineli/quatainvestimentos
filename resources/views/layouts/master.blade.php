<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.3.6.0.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>

<!-- Modal para mensagem de criacao, alteracao e exclusao de registro -->
<div id="modal-msg-info" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="icon fa fa-success"></i> AVISO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="txt-info">&nbsp;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary alert-confirm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 