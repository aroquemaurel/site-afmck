<?php
abstract class PdfFile {
    public abstract function toHtml();
    public function generatePdf($out='') {
        $html2pdf = new Pdf();
        $html2pdf->WriteHTML($this->toHtml());
        $html2pdf->Output($out, 'F');
    }
}