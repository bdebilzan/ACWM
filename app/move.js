var $table = $('#myVehiclesTable');
var $button = $('#theButton');
var $assetTable = $('#myAssetTable');
var $assetButton = $('#theButtonAsset');

var $computerTable = $('#myComputerAssets');
var $computerButton = $('#theComputerButton');

$(document).ready(function(){
    $('#sublocation').hide();

    //vehicles
    $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function(){
        $button.prop('disabled', !$table.bootstrapTable('getSelections').length)
    });
    
    $button.click(function(e){
        $('#move').modal('show');
        $('#vnos').val($.map(
            $table.bootstrapTable('getSelections'), function(row){
                return row.VNO;
            }
        ));
        $('#locationField').val('housed');
    });

    $('#moveForm').submit(function(e){
        e.preventDefault();
        var moveObject = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'move.php',
            data: moveObject,
            dataType: 'json',
            success: function(response){
                $('#alert').show();
                $('#alert_message').html(response.message);
                $('#move').modal('hide');
                location.reload();
            }
        });
    });

    //assets
    $assetTable.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function(){
        $assetButton.prop('disabled', !$assetTable.bootstrapTable('getSelections').length)
    });

    $assetButton.click(function(e){
        $('#moveAsset').modal('show');
        $('#guids').val($.map(
            $assetTable.bootstrapTable('getSelections'), function(row){
                return row.GUID;
            }
        ));
        $('#assetLocationField').val('location');
    });

    $('#assetMoveTo').change(function(){
        var pl = $(this).val();
        var res = pl.split(" ").join("_");
        $('#sublocation').show();
        $('#sublocation').load('updateSublocation.php?location=' + res);
    });

    $('#moveAssetForm').submit(function(e){
        e.preventDefault();
        var moveAssetObject = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'moveAsset.php',
            data: moveAssetObject,
            dataType: 'json',
            success: function(response){
                $('#alert').show();
                $('#alert_message').html(response.message);
                $('#moveAsset').modal('hide');
                location.reload();
            }
        });
    });

    //computers
    $computerTable.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function(){
        $computerButton.prop('disabled', !$computerTable.bootstrapTable('getSelections').length)
    });

    $computerButton.click(function(e){
        $('#moveComputer').modal('show');
        $('#computerGuids').val($.map(
            $computerTable.bootstrapTable('getSelections'), function(row){
                return row.GUID;
            }
        ));
        $('#computerMapLocation').val('map_location');
    });

    $('#moveComputerForm').submit(function(e){
        e.preventDefault();
        var moveComputerObject = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'moveComputer.php',
            data: moveComputerObject,
            dataType: 'json',
            success: function(response){
                $('#alert').show();
                $('#alert_message').html(response.message);
                $('#moveComputer').modal('hide');
                location.reload();
            }
        })
    });
});