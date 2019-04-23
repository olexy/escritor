@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
        <div align="right">
            <button type="button" name="create_tag" id="create_tag" class="btn btn-success btn-sm">Create Tag</button>
        </div>
        <br/>
            <table class="table table-hover table-bordered table-striped" id="user_table">
                <thead class="thead-light">
                    <tr>
                        <th width="75%">Tag</th>
                        <th width="25%">Action</th>
                    </tr>                    
                </thead>   
            </table>
        </div>  
    </div>


<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Tag</h4>
    </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal">
          @csrf
          <div class="form-group">
                <label class="control-label col-md-4" >Tag : </label>
                <div class="col-md-12">
                <input type="text" name="tag" id="tag" class="form-control" />
                </div>
           </div>   
           <br />
           <div class="form-group" align="center">
                <input type="hidden" name="action" id="action" value="Add"/>
                <input type="hidden" name="hidden_id" id="hidden_id" /> 
                <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add"/>
           </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this tag?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    $('#user_table').DataTable({
         processing: true,
         serverSide: true,
         ajax:{
             url: "{{ route('tags') }}",
        },
        columns:[
            {
                data: 'tag',
                name: 'tag'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
        ]
    });
    
$('#create_tag').click(function(){
     $('#formModal').modal('show');
    });

    $('#sample_form').on('submit', function(event){
        event.preventDefault();
        if($('#action').val() == 'Add')
        {
            $.ajax({
                url:"{{ route('tag.store') }}",
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                success:function(data)
                {
                    var html = '';
                    if(data.errors)
                    {
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if(data.success)
                    {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#sample_form')[0].reset();
                        $('#user_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            });
        }

        if($('#action').val() == "Edit")
        {
            $.ajax({
                url:"{{ route('tag.update', '') }}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {
                    // console.log($('#hidden_id').val())
                    var html = '';
                    if(data.errors)
                    {
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                        if(data.success)
                    {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#sample_form')[0].reset();
                        $('#user_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            });
        }
    });

    $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
        url:"{{ route('tag.edit', '')}}/"+id,    
        dataType:"json",
        success:function(html){
                $('#tag').val(html.data.tag);
                $('#hidden_id').val(id);
                $('.modal-title').text("Edit New Tag");
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal('show');
                // console.log($('#hidden_id').val())
            }
        })
    });

    var user_id;

    $(document).on('click', '.delete', function(){
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
        $.ajax({
            url:"{{ route('tag.delete', '')}}/"+user_id,
            beforeSend:function(){
                $('#ok_button').text('Deleting...');
            },
            success:function(data)
            {
                setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#user_table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });

});

</script>
@stop