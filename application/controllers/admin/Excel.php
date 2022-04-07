<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends Admin_Controller {

	public function product_export() {

		$perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'read');

		if (!$perm) {

			$fileName = 'export-products-'.time().'.xlsx';	
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', "You don't have permission.");

            $sheet->setTitle('Exported Products');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit();
        }
		
		$getProductData = $this->db->query('SELECT a.product_name, a.slug, a.bm_name, b.category as category_level_1, c.category as category_level_2, a.sku_code, a.hsn_code, a.dimension, a.net_weight, a.deno, a.stock, a.mrp, a.selling_price, a.available_date, a.available_time, a.is_active, a.featured, a.popular, a.display_on_home, a.on_sale, a.product_tag
			FROM product as a
			INNER JOIN category as b ON a.category_level_1 = b.id
			LEFT JOIN category as c ON a.category_level_2 = c.id
			ORDER BY a.id desc')->result_object();

		if (!empty($getProductData)) {			

			$fileName = 'export-products-'.time().'.xlsx';	
			$spreadsheet = new Spreadsheet();
 			$sheet = $spreadsheet->getActiveSheet();

	        // set Header
	        $sheet->SetCellValue('A1', '#');
	        $sheet->SetCellValue('B1', 'Product Name');
	        $sheet->SetCellValue('C1', 'Slug');
	        $sheet->SetCellValue('D1', 'BM Name');
	        $sheet->SetCellValue('E1', 'Category Level 1');
	        $sheet->SetCellValue('F1', 'Category Level 2');
	        $sheet->SetCellValue('G1', 'SKU Code');
	        $sheet->SetCellValue('H1', 'Dimension');
	        $sheet->SetCellValue('I1', 'Net Weight');
	        $sheet->SetCellValue('J1', 'Deno (gm)');
	        $sheet->SetCellValue('K1', 'Stock');
	        $sheet->SetCellValue('L1', 'MRP');
	        $sheet->SetCellValue('M1', 'SP');
	        $sheet->SetCellValue('N1', 'Product Tag');
	        $sheet->SetCellValue('O1', 'Available Date');
	        $sheet->SetCellValue('P1', 'Available Time');
	        $sheet->SetCellValue('Q1', 'Status');
	        $sheet->SetCellValue('R1', 'Featured');
	        $sheet->SetCellValue('S1', 'Popular');
	        $sheet->SetCellValue('T1', 'Display on Home');
	        $sheet->SetCellValue('U1', 'On Sale');
	        $sheet->SetCellValue('V1', 'HSN Code');

	        // set Row
	        $rowCount = 2;
	        $i=1;
	        foreach ($getProductData as $prod) {

	        	$status = "Inactive";
	        	$featured = "No";
	        	$popular = "No";
	        	$displayOnHome = "No";
	        	$onSale = "No";
	        	$date = "";
	        	$time = "";

	            if ($prod->is_active) {
	                $status = "Active";
	            }

	            if ($prod->featured) {
	                $featured = "Yes";
	            }

	            if ($prod->popular) {
	                $popular = "Yes";
	            }

	            if ($prod->display_on_home) {
	                $displayOnHome = "Yes";
	            }

	            if ($prod->on_sale) {
	                $onSale = "Yes";
	            }

	            if (!empty($prod->available_date)) {
	            	$date = date('d-m-Y', strtotime($prod->available_date));
	            }

	            if (!empty($prod->available_time)) {
	            	$time = date('h:i A', strtotime($prod->available_time));
	            }

	            $sheet->SetCellValue('A' . $rowCount, $i++);
	            $sheet->SetCellValue('B' . $rowCount, $prod->product_name);
	            $sheet->SetCellValue('C' . $rowCount, $prod->slug);
	            $sheet->SetCellValue('D' . $rowCount, $prod->bm_name);
	            $sheet->SetCellValue('E' . $rowCount, $prod->category_level_1);
	            $sheet->SetCellValue('F' . $rowCount, $prod->category_level_2);
	            $sheet->SetCellValue('G' . $rowCount, $prod->sku_code);
	            $sheet->SetCellValue('H' . $rowCount, $prod->dimension);
	            $sheet->SetCellValue('I' . $rowCount, $prod->net_weight);
	            $sheet->SetCellValue('J' . $rowCount, $prod->deno);
	            $sheet->SetCellValue('K' . $rowCount, $prod->stock);
	            $sheet->SetCellValue('L' . $rowCount, $prod->mrp);
	            $sheet->SetCellValue('M' . $rowCount, $prod->selling_price);
	            $sheet->SetCellValue('N' . $rowCount, $prod->product_tag);
	            
	            $sheet->SetCellValue('O' . $rowCount, $date);
	            $sheet->SetCellValue('P' . $rowCount, $time);
	            $sheet->SetCellValue('Q' . $rowCount, $status);
	            $sheet->SetCellValue('R' . $rowCount, $featured);
	            $sheet->SetCellValue('S' . $rowCount, $popular);
	            $sheet->SetCellValue('T' . $rowCount, $displayOnHome);
	            $sheet->SetCellValue('U' . $rowCount, $onSale);
	            $sheet->SetCellValue('V' . $rowCount, $prod->hsn_code);
	            $rowCount++;
	        }

	        $writer = new Xlsx($spreadsheet);
	        header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename='.$fileName);
			header('Cache-Control: max-age=0');
			$writer->save('php://output'); // download file			
		} else {
			redirect(base_url('admin/product'),'refresh');
		}
	}

}

/* End of file Export.php */
/* Location: ./application/controllers/admin/Export.php */