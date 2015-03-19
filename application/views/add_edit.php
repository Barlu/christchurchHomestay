<div class="modal-body container-fluid">
    <?php
    echo form_open();
    if (isset($room)) {
        ?>
        <div class="form-group col-xs-12 has-feedback">
            <?php
            echo form_label('Room Number', 'number', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'number',
                'id' => 'number',
                'class' => 'form-control input-lg',
                'placeholder' => 'Room Number',
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
        <!--        AGE-->
        <div class="form-group col-xs-4 has-feedback">
            <?php
            echo form_label('Age', 'age', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'age',
                'id' => 'age',
                'class' => 'form-control input-lg',
                'placeholder' => 'Age',
                'data-toggle' => 'tooltip'
                    ], set_value('age', $booking->age));
            ?>
        </div>
        <!--        NATIONALITY-->
        <div class="form-group col-xs-4 has-feedback">
            <?php
            echo form_label('Nationality', 'nationality', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'nationality',
                'id' => 'nationality',
                'class' => 'form-control input-lg',
                'placeholder' => 'Nationality',
                'data-toggle' => 'tooltip'
                    ], set_value('nationality', $booking->nationality));
            ?>
        </div>
        <!--        GENDER-->
        <div class="form-group col-xs-4 col-md-4 has-feedback">
            <?php
            echo form_label('Gender', 'phone', [
                'class' => 'control-label sr-only'
            ]);
            echo form_dropdown('gender', [FALSE => 'Gender', 'male' => 'Male','female' => 'Female'], set_value('gender', $booking->gender), 'id = "gender" class = "form-control input-lg"')
            ?>
        </div>
        <!--        EDUCATION PROVIDER-->
        <div class="form-group col-xs-12 has-feedback">
            <?php
            echo form_label('Education Provider', 'education_provider', [
                'class' => 'control-label sr-only'
            ]);
            echo form_input([
                'name' => 'education_provider',
                'id' => 'education_provider',
                'class' => 'form-control input-lg',
                'placeholder' => 'Education Provider',
                'data-toggle' => 'tooltip'
                    ], set_value('education_provider', $booking->education_provider));
            ?>
        </div>
        
        
        <!--        DATE RANGE PICKER-->
        <div id="datepicker" class="form-group col-xs-12 col-md-4 has-feedback">
            <?php
            echo form_label('Dates', 'dates', [
                'onclick' => "$('#date').focus()",
                'class' => 'sr-only'
            ]);
            ?>
            <div class="input-group">
                <span onclick="$('#date').focus()" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <?php
                echo form_input([
                    'name' => 'dates',
                    'id' => 'dates',
                    'class' => 'form-control input-lg  ',
                    'data-toggle' => 'tooltip',
                    'placeholder' => 'Dates'
                        ], set_value('dates', $booking->dates));
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
        <!--        STATUS-->
        <div class="form-group col-xs-12 col-md-4 has-feedback">
            <?php
            echo form_label('Status', 'status', [
                'class' => 'control-label sr-only'
            ]);
            echo form_dropdown('status', $status, set_value('status', $booking->status), 'id = "status" class = "form-control input-lg" placeholder = "Status" data-toggle = "tooltip"');
            ?>
        </div>
        <!--        ARCHIVE-->
        <div class="form-group float-wrap pull-right">
            <?php
            echo form_label('Archive', 'archive', [
                'class' => 'checkbox-inline'
            ]);
            echo form_checkbox('archive', 1, set_value('archive', [$booking->archive, 0]), 'class = "checkbox-inline"');
            
            
            
            
            
            ?>
        </div>
        <!--        Hidden - Id-->
        <?php
        echo form_hidden('booking', set_value($booking->id));
    }
    ?>
    <div class="float-wrap pull-right ">
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
        $(function() {
            $('#dates').daterangepicker({
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
        
        $(function(){
            $('#gender :first-child').prop('disabled', true);
            $('#room_id :first-child').prop('disabled', true);
            $('#status :first-child').prop('disabled', true);
        });
        
    </script>
</div>
