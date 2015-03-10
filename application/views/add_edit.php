<div class="modal-body container-fluid">
    <?php
    echo form_open();
    if (isset($room)) {
        ?>
        <div class="form-group col-xs-12 has-feedback">
            <?php
            echo form_label('Room Name', 'name', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'name',
                'id' => 'name',
                'class' => 'form-control input-lg',
                'placeholder' => 'Room Name',
                'data-toggle' => 'tooltip'
            ]);
            ?>
        </div>
        <?php
        echo form_hidden('room', set_value($room->id));
    } else {
        ?>
        <!--        FIRST NAME-->
        <div class="form-group col-xs-6 has-feedback">
            <?php
            echo form_label('First Name', 'first_name', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'first_name',
                'id' => 'first_name',
                'class' => 'form-control input-lg',
                'placeholder' => 'First Name',
                'data-toggle' => 'tooltip'
                    ], set_value('first_name', $booking->first_name));
            ?>
        </div>
        <!--        LAST NAME-->
        <div class="form-group col-xs-6 has-feedback">
            <?php
            echo form_label('Last Name', 'last_name', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'last_name',
                'id' => 'last_name',
                'class' => 'form-control input-lg',
                'placeholder' => 'Last Name',
                'data-toggle' => 'tooltip'
                    ], set_value('last_name', $booking->last_name));
            ?>
        </div>
        <!--        ADDRESS-->
        <div class="form-group col-xs-12 has-feedback">
            <?php
            echo form_label('Address', 'address', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'address',
                'id' => 'address',
                'class' => 'form-control input-lg',
                'placeholder' => 'Address',
                'data-toggle' => 'tooltip'
                    ], set_value('address', $booking->address));
            ?>
        </div>
        <!--        PHONE-->
        <div class="form-group col-xs-12 col-md-4 has-feedback">
            <?php
            echo form_label('Phone', 'phone', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'phone',
                'id' => 'phone',
                'class' => 'form-control input-lg',
                'placeholder' => 'Phone',
                'data-toggle' => 'tooltip'
                    ], set_value('phone', $booking->phone));
            ?>
        </div>
        <!--        DATE RANGE PICKER-->
        <div id="datepicker" class="form-group col-xs-12 col-md-4 has-feedback">
            <?php
            echo form_label('Planned Stay', 'planned_stay', [
                'onclick' => "$('#date').focus()",
                'class' => 'sr-only'
            ]);
            ?>
            <div class="input-group">
                <span onclick="$('#date').focus()" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <?php
                echo form_input([
                    'name' => 'planned_stay',
                    'id' => 'planned_stay',
                    'class' => 'form-control input-lg  ',
                    'data-toggle' => 'tooltip',
                    'placeholder' => 'Planned Stay'
                        ], set_value('planned_stay', $booking->planned_stay));
                ?>
            </div>
        </div>

        <!--        ROOM DROPDOWN-->
        <div class="form-group col-xs-12 col-md-4 has-feedback">
            <?php
            echo form_label('Room', 'room_id', [
                'class' => 'control-label sr-only'
            ]);
            echo form_dropdown('room_id', $rooms, set_value('room_id', $booking->room_id), 'id = "room_id" class = "form-control input-lg" placeholder = "Room" data-toggle = "tooltip"');
            ?>
        </div>
        <!--        Hidden - Id-->
        <?php
        echo form_hidden('booking', set_value($booking->id));
    }
    ?>
    <div class="btn-wrap pull-right">
        <button type="button" class="btn btn-default btn-lg" id="cancel" name="cancel" onclick="my_redirect('<?php echo base_url();?>index.php/admin/dashboard')">Cancel</button>
        <?php
        echo form_submit([
            'name' => 'submit',
            'class' => 'btn btn-primary btn-lg'
                ], 'Save');
        ?>
    </div>
    <?php
    echo form_close();
    ?>
    <script>
        $(document).ready(function() {
            $('#planned_stay').daterangepicker({
                format: 'DD/MM/YYYY',
                showDropdowns: true,
                showWeekNumbers: true,
                seperator: '-',
                applyClass: 'btn btn-primary btn-lg',
                cancelClass: 'btn btn-default btn-lg',
                opens: 'center'
            });
        });
        
        function my_redirect(url){
            location.href= url;
        }
        
    </script>
</div>
