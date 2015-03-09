<div class="modal-body container-fluid">
    <?php
    echo form_open();
    if ($this->input->post('room')) {
        ?>
        <div class="form-group col-xs-12 has-feedback">
            <?php
            echo form_label('Room', 'room_name');
            echo form_input('room_name');
            ?>
        </div>
        <?php
        echo form_hidden('room', $room_id);
    } else {
        ?>
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
                    ], set_value('address', ''));
            ?>
        </div>
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
        <div id="datepicker" class="form-group col-xs-12 col-md-4 has-feedback">
            <?php
            echo form_label('Date Range', 'date', [
                'onclick' => "$('#date').focus()",
                'class' => 'sr-only'
            ]);
            ?>
            <div class="input-group">
                <span onclick="$('#date').focus()" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <?php
                echo form_input([
                    'name' => 'date',
                    'id' => 'date',
                    'class' => 'form-control input-lg  ',
                    'data-toggle' => 'tooltip',
                    'placeholder' => 'Date Range'
                        ], set_value('date_from'));
                ?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-md-4 has-feedback">
            <?php
            echo form_label('Room', 'room_id', [
                'class' => 'control-label sr-only'
            ]);
            echo form_dropdown('room_id', $rooms, set_value('room_id'), 'id = "room_id" class = "form-control input-lg" placeholder = "Room" data-toggle = "tooltip"');
            ?>
        </div>

        <?php
        echo form_hidden('customer');
    }
    ?>
    <div class="btn-wrap pull-right">
        <button type="button" class="btn btn-default btn-lg" name="cancel">Cancel</button>
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
            $('#date').daterangepicker({
                format: 'DD/MM/YYYY',
                showDropdowns: true,
                showWeekNumbers: true,
                seperator: '-',
                applyClass: 'btn btn-primary btn-lg',
                cancelClass: 'btn btn-default btn-lg',
                opens: 'center'
            });
        });
    </script>
</div>
