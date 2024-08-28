<?php

use Carbon\Carbon;
require_once __DIR__ . '/../../vendor/autoload.php';

// use Technick/PDF/TCPDF;

function generatePdf($order)
{
    // Initialize TCPDF
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Company Name');
    $pdf->SetTitle('Tax Invoice');
    $pdf->SetSubject('Invoice');

    // Add a page
    $pdf->AddPage();

    // Load the compiled CSS from the public folder
    $css = '<style>' . file_get_contents(public_path('css/app.css')) . '</style>';

    // Your full HTML content
    $html = '
    <div class="invoice-container">
        <div class="container">
            <div class="row mt-4">
                <div class="col-4">
                    <h1 class="mb-4 text-custom">TAX INVOICE</h1>
                    <div class="mb-3">
                        <div class="col">
                            <span class="text-custom">INVOICE:</span>
                        </div>
                        <div class="col text-right">
                            <span class="bold">NN-78794</span>
                        </div>
                    </div>
                    <div class="">
                        <div class="col">
                            <span class="text-custom">ISSUE DATE:</span>
                        </div>
                        <div class="col text-right">
                            <span class="bold">Aug. 23, 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 p-3" style="border-left: 2px solid #d18a7d;">
                    <span class="bold text-custom">SOLD BY</span>
                    <div class="my-2">
                        <span class="bold">Noha Nabil Beauty FZCo</span>
                        <span>Office No. B34BS33O002</span>
                        <span>Jafza 22 Building</span>
                        <span>Jebel Ali Free Zone</span>
                        <span>Dubai</span>
                        <span>DU</span>
                        <span>United Arab Emirates</span>
                        <span>TRN: 100454885300003</span>
                    </div>
                    <div style="margin-top: 40px">
                        <span class="bold text-custom">CLIENT</span>
                        <span class="bold">laila said harid</span>
                        <span>Oman</span>
                        <span>E</span>
                        <span>صالله A</span>
                        <span>Oman</span>
                    </div>
                </div>
                <div class="col-3 p-3">
                    <img width="122" height="55" src="">
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="table-responsive">
                <table class="table">
                    <thead style="border-bottom: 3px solid #d18a7d;">
                        <tr>
                            <th class="text-custom" style="width: 30%;">Item</th>
                            <th class="text-custom" style="width: 20%;">Description</th>
                            <th class="text-custom" style="width: 10%;">Quantity</th>
                            <th class="text-custom" style="width: 10%;">Unit Price</th>
                            <th class="text-custom" style="width: 10%;">Discount</th>
                            <th class="text-custom" style="width: 10%;">Tax Amount</th>
                            <th class="text-custom" style="width: 10%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 30%;">Row 1, Col 1</td>
                            <td style="width: 20%;">Row 1, Col 2</td>
                            <td style="width: 10%;">Row 1, Col 3</td>
                            <td style="width: 10%;">Row 1, Col 4</td>
                            <td style="width: 10%;">Row 1, Col 5</td>
                            <td style="width: 10%;">Row 1, Col 6</td>
                            <td style="width: 10%;">Row 1, Col 7</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Row 2, Col 1</td>
                            <td style="width: 20%;">Row 2, Col 2</td>
                            <td style="width: 10%;">Row 2, Col 3</td>
                            <td style="width: 10%;">Row 2, Col 4</td>
                            <td style="width: 10%;">Row 2, Col 5</td>
                            <td style="width: 10%;">Row 2, Col 6</td>
                            <td style="width: 10%;">Row 2, Col 7</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Row 3, Col 1</td>
                            <td style="width: 20%;">Row 3, Col 2</td>
                            <td style="width: 10%;">Row 3, Col 3</td>
                            <td style="width: 10%;">Row 3, Col 4</td>
                            <td style="width: 10%;">Row 3, Col 5</td>
                            <td style="width: 10%;">Row 3, Col 6</td>
                            <td style="width: 10%;">Row 3, Col 7</td>
                        </tr>
                        <!-- New rows with colspan -->
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="3" class="text-custom" style="vertical-align: middle;">Total</td>
                            <td colspan="2" style="text-align: right; vertical-align: middle;">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="3" class="text-custom" style="vertical-align: middle;">AMOUNT PAID</td>
                            <td colspan="2" style="text-align: right; vertical-align: middle;">$0.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row border-dotted">
                <div class="col-md-3" style="width: 25%;">ISSUE DATE:</div>
                <div class="col-md-3" style="width: 25%;">Aug. 23, 2024</div>
                <div class="col-md-3" style="width: 25%;">AMOUNT DUE:</div>
                <div class="col-md-3 text-right" style="width: 25%;">0.00إ.د</div>
            </div>
        </div>

        <div class="highlight">
            <div class="container mt-5">
                <div class="p-4">
                    <div class="row">
                        <div class="col-8">
                            <span>Thank you for your purchase.</span>
                        </div>
                        <div class="col-4" style="border-left: 2px solid #cecdcdb0;">
                            <div>
                                <span class="bold text-custom">PAYMENT METHOD</span>
                                <span class="bold">Credit Card</span>
                            </div>
                            <div style="margin-top: 10px;">
                                <span class="bold text-custom">ORDER NUMBER</span>
                                <span>#NN-78794</span>
                            </div>
                        </div>
                    </div>
                    <div class="separator">
                        <div class="row mt-4">
                            <div class="col contact-info">
                                <span class="font-weight-bold text-custom">Noha Nabil Beauty FZCO</span>
                            </div>
                            <div class="col contact-info">
                                <span class="font-weight-bold">Phone: +9718006642</span>
                            </div>
                            <div class="col contact-info">
                                <span>Email: customercare@nnbeauty.com</span>
                            </div>
                            <div class="col">
                                <span>Website: nohanabil.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2" style="text-align: center;">
                        <span>Facebook: facebook.com/NohaNabilBeauty</span>
                    </div>
                    <div class="mt-4" style="text-align: center;">
                        <span>View this document online at https://noha-nabil.sufio.com/cxqy9zseba4q?fekfcevfcg.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

    // Combine CSS and HTML
    $content = $css . $html;

    // Write HTML content to PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Output PDF
    $pdf->Output('invoice.pdf', 'I');
}

