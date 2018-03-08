
<script src="{{url('resources/assets/admin/js/oneui.min.js')}}"></script>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update User Status</h4>
        </div>
        <div class="modal-body">
        	<div class="statusbuutons">
	          	<a class="statusId_1 successbtns" href="" data-newstatus="1"><button class="btn-success"> Active </button></a>
	          	<a class="statusId_0 successbtns" href="" data-newstatus="0"><button class="btn-danger"> Block </button></a>
	          	<a id="tempactive" class="statusId_3 successbtns" data-newstatus="3"><button class="btn-warning">Temp Active</button></a>
          	</div>
          	<div class="clearfix"> </div>
          	<input type="text" name="days" class="adddays form-group" placeholder="temporary days" style="display:none">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@yield('js')
</body>
</html>