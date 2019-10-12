<div class="form-group">
    <?php foreach ($users_role as $user): ?>
    <div class="row">

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id; ?>">

        <div class="col-sm-3">
            <input type="radio" name="role" value="admin" <?php echo (set_value('admin', $user->role == 'admin')) ? "checked" : "";?> id="role_admin"
                   class="square-purple" required>
            <label for="role_admin" class="option-label"><?php echo trans('admin'); ?></label>
        </div>
        <div class="col-sm-3">
            <input type="radio" name="role" value="author" <?php echo (set_value('author', $user->role == 'author')) ? "checked" : "";?> id="role_editor"
                   class="square-purple" required>
            <label for="role_editor" class="option-label"><?php echo trans('author'); ?></label>

        </div>
        <div class="col-sm-3">
            <input type="radio" name="role" value="user" <?php echo (set_value('user', $user->role == 'user')) ? "checked" : "";?> id="role_user"
                   class="square-purple" required>
            <label for="role_user" class="option-label"><?php echo trans('user'); ?></label>

        </div>
        <div class="col-sm-3">
            <input type="radio" name="role" value="contributor" <?php echo (set_value('contributor', $user->role == 'contributor')) ? "checked" : "";?> id="role_contributor"
                   class="square-purple" required>
            <label for="role_contributor" class="option-label"><?php echo trans('contributor'); ?></label>

        </div>
    </div>
    <?php endforeach; ?>
</div>