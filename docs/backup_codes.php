                    
                    <!-- INPUT FOR TEACHERS -->
                    <td>
                       <?php 
                           $s = '';
                           $subjects = str_split(trim($teacher['subjects']));
                           foreach ($subjects as $subject) {
                              $s_temp = getSubjectById($subject, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['subject_code'].', ';
                           }
                           echo $s;
                        ?>
                    </td>
                    <td>
                      <?php 
                           $g = '';
                           $grades = str_split(trim($teacher['grades']));
                           foreach ($grades as $grade) {
                              $g_temp = getGradeById($grade, $conn);
                              if ($g_temp != 0) 
                                $g .=$g_temp['grade_code'].'-'.
                                     $g_temp['grade'].', ';
                           }
                           echo $g;
                        ?>
                    </td>


                    <!-- INPUTS FROM TEACHER ADD  -->
                    
                <div class="mb-3">
                    <label class="form-label">Grade</label>

                    <div class="row row-cols-5"> 
                    <?php foreach ($grades as $grade): ?>
                    
                    <div class="col">
                    <input type="checkbox" name="grades[]" value="<?=$grade['grade_id']?>"> 
                    <?=$grade['grade_code']?>-<?=$grade['grade']?>
                    <!-- ENCLOSED IN PHP TAG ARE THE VARIABLES YOU WANT TO DISPLAY -->


                    </div>
                    <?php endforeach ?>
                    </div>

                </div>

                        <!-- NEW COLUMN THAT HAS BEEN ADDED -->
                <div class="mb-3">
                    <label class="form-label">Section</label>
                    <div class="row row-cols-5">

                    <!-- USE TO DISPLAY SECTION USING FOR LOOP  -->
                    <?php foreach ($sections as $section): ?>
                    
                        <div class="col">
                        <input type="checkbox" name="section[]" value="<?=$section['section_id']?>"> 
                        <?=$section['section']?>
                        </div>

                    <?php endforeach ?>

                    </div>
                </div>



<!-- 
                GRADE AND SECTION INPUT IN TEACHER EDIT  -->

                
   <div class="mb-3">
    <label class="form-label">Grade</label>

    <div class="row row-cols-5"> 
    <!-- USE TO DISPLAY GRADES USING FOR LOOP  -->
    <?php 
        // USED TO SPLIT GRADES DATA'S
        $grade_ids = str_split(trim($teacher['grades']));
    

        foreach ($grades as $grade){ 
            $checked = 0;
            foreach ($grade_ids as $grade_id){
                if ($grade_id == $grade['grade_id']) {
                    $checked = 1;
                }
            }

            ?>
      
      <div class="col">
      <input type="checkbox" 
      name="grades[]" 
      <?php if($checked) echo "checked"; ?>
      value="<?=$grade['grade_id']?>"> 
      <?=$grade['grade_code']?>-<?=$grade['grade']?>
      <!-- ENCLOSED IN PHP TAG ARE THE VARIABLES YOU WANT TO DISPLAY -->


    </div>
    <?php } ?>
    </div>

  </div>


  <!-- CHECKBOX FOR SECTION  -->

<div class="mb-3">
  <label class="form-label">Section</label>

  <div class="row row-cols-5"> 
  <!-- USE TO DISPLAY GRADES USING FOR LOOP  -->
  <?php 
      // USED TO SPLIT GRADES DATA'S
      $section_ids = str_split(trim($teacher['section']));
  

      foreach ($sections as $section){ 
          $checked = 0;
          foreach ($section_ids as $section_id){
              if ($section_id == $section['section_id']) {
                  $checked = 1;
              }
          }

          ?>
    
    <div class="col">
    <input type="checkbox" 
    name="sections[]" 
    <?php if($checked) echo "checked"; ?>
    value="<?=$section['section_id']?>"> 
    <?=$section['section']?>
    <!-- ENCLOSED IN PHP TAG ARE THE VARIABLES YOU WANT TO DISPLAY -->


  </div>
  <?php } ?>
  </div>

</div>