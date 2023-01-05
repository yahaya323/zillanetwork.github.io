<div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="post" action="<?=base_url('search')?>" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="searchtitle" type="text" placeholder="Search..." aria-label="Search" required>
                        <button class="tm-search-button" type="submit" name="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            