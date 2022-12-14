<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Nilais</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-kode_matpel">
                                        <th class="title"> Kode Matpel: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['kode_matpel']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="kode_matpel" 
                                                data-title="Enter Kode Matpel" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['kode_matpel']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nis">
                                        <th class="title"> Nis: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['nis']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="nis" 
                                                data-title="Enter Nis" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['nis']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-semester">
                                        <th class="title"> Semester: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['semester']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="semester" 
                                                data-title="Enter Semester" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['semester']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kelas">
                                        <th class="title"> Kelas: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['kelas']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="kelas" 
                                                data-title="Enter Kelas" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['kelas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h1">
                                        <th class="title"> H1: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h1" 
                                                data-title="Enter H1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h2">
                                        <th class="title"> H2: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h2" 
                                                data-title="Enter H2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h3">
                                        <th class="title"> H3: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h3" 
                                                data-title="Enter H3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h4">
                                        <th class="title"> H4: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h4" 
                                                data-title="Enter H4" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h5">
                                        <th class="title"> H5: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h5" 
                                                data-title="Enter H5" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h6">
                                        <th class="title"> H6: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h6" 
                                                data-title="Enter H6" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h7">
                                        <th class="title"> H7: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h7" 
                                                data-title="Enter H7" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-h8">
                                        <th class="title"> H8: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['h8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="h8" 
                                                data-title="Enter H8" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['h8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-hph">
                                        <th class="title"> Hph: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['hph']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="hph" 
                                                data-title="Enter Hph" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['hph']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-hpts">
                                        <th class="title"> Hpts: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['hpts']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="hpts" 
                                                data-title="Enter Hpts" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['hpts']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-hpas">
                                        <th class="title"> Hpas: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['hpas']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="hpas" 
                                                data-title="Enter Hpas" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['hpas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-hpa">
                                        <th class="title"> Hpa: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['hpa']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="hpa" 
                                                data-title="Enter Hpa" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['hpa']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-predikat">
                                        <th class="title"> Predikat: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['predikat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="predikat" 
                                                data-title="Enter Predikat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['predikat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-created_at">
                                        <th class="title"> Created At: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['created_at']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="created_at" 
                                                data-title="Enter Created At" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['created_at']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-updated_at">
                                        <th class="title"> Updated At: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['updated_at']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("nilais/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="updated_at" 
                                                data-title="Enter Updated At" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['updated_at']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("nilais/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("nilais/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
