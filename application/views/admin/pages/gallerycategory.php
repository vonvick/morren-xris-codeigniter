<div class="container">
  <h3 class="center-align">Gallery Categories</h3>
  <p class="flow-text center-align">Your gallery categories are listed below. You can add a new category, delete images in a category and rename a category</p>
    <div id="gallery_category_list">
      <a class="btn waves-effect waves-light blue" id="gallerycategory">Create a category<i class="material-icons right">send</i></a>
      <div class="row">
        <?php if(isset($message)) { ?>
          <p class="message center-align"><?php echo $message; ?></p>
        <?php } ?>
        <?php if(! $query) { ?>
            <p class="flow-text center-align">Sorry... you have not created a category yet. Click the button below to create one</p>
        <?php } else {?>
            <table class="responsive-table striped bordered">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Category Description</th>
                  <th>Category Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($query as $row) { ?>
                <tr>
                  <td><a href="<?php echo base_url('admin/gallerycategories/get_category_images/'. $row->id); ?>"><?php echo $row->name; ?></a></td>
                  <td><?php echo $row->description; ?></td>
                  <td>
                    <?php if ($row->active == 'true'){ ?>
                    <a class="btn-floating disabled blue" title="Set as active"><i class="material-icons">publish</i></a>
                    <?php } else { ?>
                    <a class="btn-floating green publish" data-category-id="<?php echo $row->id ?>" title="Set as active"><i class="material-icons">publish</i></a>
                    <?php } ?>
                    <a class="btn-floating orange" href="<?php echo base_url('admin/gallerycategories/edit_category/'. $row->id); ?>" title="Edit category"><i class="material-icons">mode_edit</i></a>
                    <a class="btn-floating red modal-trigger" href="#<?php echo $row->id; ?>" title="Delete category"><i class="material-icons">delete_forever</i></a>
                  </td> 
                </tr>
                <div id="<?php echo $row->id; ?>" class="modal">
                  <div class="modal-content">
                    <h4>Delete Category</h4>
                    <p>Deleting this category will delete the images associated with it.</p>
                    <p>Do you want to really delete it?</p>
                  </div>
                  <div class="modal-footer">
                    <a href="<?php echo base_url('admin/gallerycategories/delete_category/'. $row->id); ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Yes, Delete</a>
                  </div>
                </div>
                <?php } ?>
              </tbody>
            </table>
        <?php } ?>
      </div>
    </div>
    
    <div id="create_category" class="hidden row">
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/gallerycategories/create_category'); ?>
      <div class="input-field col s12">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter a name for the Category">
      </div>
      <div class="input-field col s12">
        <label for="name">Description</label>
        <textarea name="description" id="description" class="materialize-textarea validate" placeholder="Enter a brief description for this category"></textarea>
      </div>
      <button class="btn waves-effect waves-light blue">Submit<i class="material-icons right">send</i></button>
      <a class="btn btn-flat" id="category-back">Go Back</a>
    </form>
    </div>
</div>