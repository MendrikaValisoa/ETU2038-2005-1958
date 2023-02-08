<div class="">
    <!-- Page Content -->
      <div class="container">
        <h1> Liste des clients </h1>
        <h6> Nombre de client : <?php echo count($categorie); ?></h6>
        
        <div class="row">
          <!-- Table -->
          <!-- <div class="table-responsive"> -->
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nom</th>
                </tr>
              </thead>
              <tbody>
                <?php  for ($i=0; $i < count($categorie); $i++) { ?>
                <tr>
                  <td>  <?php echo $categorie[$i]['nom']; ?> </a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          <!-- </div> -->
        </div>    
      </div>
      <div class="container">
      <section class="register-photo">
            <div class="form-container">
                <div class="image-holder"></div>
                <form action="<?php echo base_url('Log/insertCat');?>" method="post">
                    <h2 class="text-center"><strong>Create</strong> an account.</h2>
                    <div class="form-group"><input class="form-control" type="text" name="nom" placeholder="nom"></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Ajouter</button></div>
                </form>
            </div>
        </section>
    </div>
</div>      