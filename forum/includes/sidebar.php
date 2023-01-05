
            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="<?=base_url('search')?>" method="post">
                  <input type="text" name="searchtitle" >
                  <button type="submit" name="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <?php $query=mysqli_query($con,"select * from tblcategory");
                     while($row=mysqli_fetch_array($query))
                     {
                ?>
                <ul>
                  <li><a href="<?= base_url('category/'.$row['id'].'/'.$row['CategoryName']);?>"><?php echo htmlentities($row['CategoryName']);?></a></li>
                </ul>
                  <?php } ?>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                     <?php
                        $sql = mysqli_query($con, "select id, PostImage, PostUrl, PostingDate, PostTitle from tblposts where Is_Active = 1 order by id desc LIMIT 4");
                        while($row = mysqli_fetch_array($sql)){ 

                        ?>
                <div class="post-item clearfix">
                  <img src="<?= base_url('admin/'.$row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  <h4><a href="<?= base_url('post/'.$row['id'].'/'.$row['PostUrl']);?>"><?php echo htmlentities($row['PostTitle']);?></a></h4>
                  <time datetime="2020-01-01"><?php $d = strtotime($row['PostingDate']); echo date('Y-d-M', $d);?></time>
                </div>
            <?php }?>
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">SERVICES</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">Forum</a></li>
                  <li><a href="#">SEO Tools</a></li>
                  <li><a href="#">Email Marketing Tools</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->
