<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    use PHPMailer\PHPMailer\PHPMailer;
    include '../connect.php';

    $freelancer_id = $_GET['id'];
    $role = $_GET['role'];

    $get_freelancer_details = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id' ORDER BY id DESC";
    $get_freelancer_details_query = mysqli_query($conn , $get_freelancer_details);
    $get_freelancer_details_assoc = mysqli_fetch_assoc($get_freelancer_details_query);

    $email = $get_freelancer_details_assoc['email'];
    $name = $get_freelancer_details_assoc['firstname'].' '.$get_freelancer_details_assoc['lastname'];
    $address = $get_freelancer_details_assoc['address'].', '.$get_freelancer_details_assoc['street'].', '.$get_freelancer_details_assoc['city'].', '.$get_freelancer_details_assoc['state'].', '.substr($get_freelancer_details_assoc['country_name'], 0, strpos($get_freelancer_details_assoc['country_name'], '('));

    

    require_once('TCPDF/examples/tcpdf_include.php');
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // set document information
    $pdf->setCreator(PDF_CREATOR);
    $pdf->setAuthor('Bhavya Haria');
    $pdf->setTitle('Freelancer Agreement');
    
    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    // set margins
    $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    
    // set auto page breaks
    $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    // set font
    $pdf->setFont('times', '', 12);
    
    // add a page
    $pdf->AddPage();
    
    // ---------------------------------------------------------

    $html='This Freelance Agreement, hereinafter known as the “Agreement”, is created on the '.date('d').'th day of
        <strong>'.date('F').'</strong> '.date('Y').' by and between, and <strong>is Effective from Date '.date('d/m/y').'</strong>
        <br>
        <br>
        <br><h3>1. PARTIES</h3>
        <br><strong>Bluepen Assignment Private Limited</strong> a <strong>Private Limited firm</strong>, having its principal place of business at <strong>Unit 4008/4009, Panalal
        compound, Bhandup Industrial Estate, LBS marg, Bhandup West, Mumbai-400078</strong>, acting
        through its directors <strong>Vinit Rasik Savla and Kaushik Srinivasan Iyengar</strong> (hereinafter referred to
        as the “Firm” which expression shall, unless it is repugnant to the context or meaning thereof, be
        deemed to mean and include their successors in interest, legal representatives, nominees and
        permitted assigns), <strong>OF THE ONE PART</strong>;
        <br>
        <br>And
        <br>
        <br><strong>'.$name.', Freelancer</strong> residing in/ office in <strong>'.$address.'</strong>
        <br>
        <br>Who will be collectively known as <strong>“Parties”</strong>.
        <br>
        <br><strong>WHEREAS</strong> Firm is in need of the service of Freelancer, Freelancer has the skills and is ready to
        perform such services to the Firm.
        <br>
        <br><strong>WHEREAS</strong>, Parties wish to set form Terms and Conditions in which such service will be
        provided.
        <br>
        <br><strong>Now, therefore, in consideration for the mutual promises and covenants set forth herein,
        the Parties agree as follows:</strong>
        <br>
        <br>
        <br><h3>2. DESCRIPTION OF SERVICE (PURPOSE)</h3>
        <br>A. The Firm is a partnership firm that is engaged in the business of providing academic
        assistance to clients and is in need of the specific services provided by the Freelancer to
        this end. <u>Services shall mean completion of the project or any other task assigned by the
        Firm.</u>
        <br>
        <br>B. <strong>Any change in Purpose can be made by mutual agreement between parties which
        shall be attached to this agreement.</strong>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><h3>3. DELIVERY</h3>
        <br><strong>A. Time is of the essence:</strong>
        <br>With respect to the performance of the service. The Freelancer shall perform the services
        as mentioned in the Agreement to the Firm by the date notified by the Firm.
        <br>
        <br><strong>B. Delay</strong>
        <br>If Freelancer reasonably believes that they will be unable to meet the Delivery Schedule
        in whole or in part, Freelancer should immediately notify the Firm of the anticipated
        delay and take immediate corrective action to comply with the Delivery Schedule as
        provided in this Agreement or directed by the Firm.
        <br>
        <br><strong>C.Inspection and Acceptance</strong>
        <br>i. The Firm, before acceptance, shall inspect any of the services performed by the
        Freelancer.
        <br>
        <br>ii. In the event the services performed are found to be not compliant to the
        guidelines/requirements issued at the time of undertaking assignment or any other
        obligations under this agreement, the Firm may require the Freelancer to make the
        required changes to such work delivered by the Freelancer.
        <br>
        <br><strong>D. Remedy</strong>
        <br>i. In the event that the freelancer completely fails to deliver upon his agreed service, the
        firm shall have the option of denying pay to the freelancer, which may lead to
        blacklisting of the freelancer and denial of any such assignments in the future on the
        platform.
        <br>
        <br>ii. In the event that the freelancer fails to adequately perform corrections on work
        disapproved after inspection, the firm shall have the option of reducing the sum payable
        to the freelancer as originally agreed.
        <br>
        <br>iii. <strong>Substitute Performance</strong>: If the Freelancer delays or fails to perform the service
        within the agreed timeline, the Firm may have a third party perform all or any part of the
        Services which have not been performed by Freelancer in accordance with this
        Agreement and Freelancer cannot object against the same.
        <br>
        <br>
        <br><h3>4. DUTIES/OBLIGATIONS</h3>
        <br>A. The freelancer shall not use, inscribe or identify the personal or professional details
        relating to themselves or the firm on any of the assignments submitted by them.
        <br>
        <br>B. The freelancer shall give periodic updates every 24 hours on the progress of the
        assignment undertaken.
        <br>
        <br>C. The freelancer shall comply with all such additional guidelines issued by the firm for
        each undertaken assignment.
        <br>
        <br>D. Eligibility for an increment is contingent upon achieving a merit score (60/100) or above in a minimum of 20 assignments.
        
        <br><h3>5. WORK FOR HIRE:</h3>
        <br>A. The Service done by the Freelancer is considered as ‘work for hire under the Copyright
        Act, 1957. The freelancer agrees that the work and intellectual property resulting from
        the service provided by the Freelancer to the Firm during the course of such engagement
        shall solely be owned by the firm including the right to sell, use, reproduce, modify,
        adapt, display, distribute, disclose, among others.
        <br>
        <br>
        <br><h3>6. PAYMENT:</h3>
        <br>
        <br>A. Freelancers will perform the Services at the price as agreed by the Parties for each
        project undertaken.
        <br>
        <br>B. The Freelancer acknowledges that payment varies with each project
        <br>
        <br>C. Payment shall be made by the Firm only after the delivery of the service by the
        Freelancer subject to conditions given in the agreement.
        <br>
        <br>D. In the event of a student\'s failure, freelancers shall be obligated to provide a complete refund, contingent upon the submission of verifiable proof of the student\'s failure.
        <br>
        <br>E. In the event that the freelancer submits their work beyond the stipulated deadline, Bluepen reserves the right to impose a penalty.
        <br>
        <br>F. Payment shall be disbursed on a monthly basis, with release occurring at the conclusion of each month.
        <br>
        <br>
        <br><h3>7. CONFIDENTIALITY AND NON- DISCLOSURE:</h3>
        <br>
        <br>A. Confidential Information shall mean all matters handled/undertaken/assigned to
        Freelancer in and on behalf of the Firm and also, in respect of any and all information,
        data, files, applications, orders, representations, authorizations, records, correspondences,
        statistics, material, business strategies, contact lists, or documents whether in electronic
        form or otherwise relating to the Firm or its clients that Freelancer may have access to
        including the Intellectual Property of the Firm and its clients.
        <br>
        <br>B. The Freelancers shall, during the term of this agreement and after termination, keep and
        hold all Confidential Information and Proprietary Information in strict confidence and
        trust. Freelancer agrees not to use or disclose any Confidential Information or Proprietary
        Information without the prior written consent of the Firm.
        <br>
        <br>C. The Freelancer shall refrain from copying, reproducing, sharing any Confidential
        Information wholly or in part disclosed by the Firm to the Freelancer under the terms of
        this Agreement.
        <br>
        <br>D. Freelancer may disclose Confidential Information to the extent required by law, by any
        governmental or other regulatory authority, or by a court or other authority of competent
        jurisdiction provided that, to the extent, it is legally permitted to do so, the said party
        shall immediately within 24 hours notify the Firm.
        <br>
        <br>
        <br><h3>8. EXCLUSIONS</h3>
        <br>
        <br>No obligation shall be imposed regarding confidential information if the Freelancer can
        demonstrate that the confidential information:
        <br>
        <br>i) publicly known at the time of disclosure or subsequently becomes publicly known other than
        by breach on part of the Freelancer or its representatives; ii) discovered or created by the
        Freelancer before disclosure by Firm; iii)learned by the Freelancer through legitimate means
        other than from the Firm or Firm \'s representatives; iv) is disclosed by Freelancer with the Firm\'s
        prior written approval.
        <br>
        <br>
        <br><h3>9. RESTRICTIVE COVENANT & NON-SOLICITATION:</h3>
        <br>
        <br>A. The Freelancer hereby irrevocably agrees not to circumvent, disclose confidential
        information, bypass, or obviate Firm directly or indirectly.
        <br>
        <br>B. During the course of engagement with the firm, the Freelancer shall not directly or
        indirectly solicit, nor independently accept any business related to the Firm from sources
        nor their affiliates, agents, representatives, clients, customers, and associates that are
        made available by the Firm at any time nor in any manner without prior express written
        permission of the Firm.
        <br>
        <br>C. The Freelancer shall not disclose any names, addresses, telephone, fax numbers, or email
        of any contact revealed by Firm to third parties, and the Freelancer herein recognizes that
        such contacts to be exclusive and valuable contact of the Firm and that they will not enter
        into any direct or indirect negotiations or transactions with such contacts revealed by the
        Firm.
        <br>
        <br>D. The Freelancer for a period of one (1)year after the termination of the engagement herein
        shall not directly or indirectly: (a) solicit or accept any business related to the Firm’s from
        a person, firm, or corporation that is a client of the Firm during the time that Freelancer
        was engaged by the Firm; (b) solicit or accept any business from any person, firm or
        corporation that is a prospective client of the Firm and with whom the Freelancer
        have/has had any dealings on the Firm\'s behalf during the term of engagement i.e. tenure
        of this Agreement; (d) solicit, induce, entice or attempt to solicit, induce or entice any
        employee of, or anyone working as an independent contractor for the Firm to terminate
        his or her employment at the firm.
        <br>
        <br>
        <br><h3>10. TERMINATION</h3>
        <br>
        <br><strong>A. Right To Terminate By Firm:</strong>
        <br><strong>i. Termination of Convenience:</strong> Notwithstanding anything to the contrary contained in this
        Agreement, the Firm may, at any time, terminate this Agreement, in whole or in part, with or
        without cause, without liability or obligation, for unperformed Services, upon 15 business
        days prior written notice.
        <br><strong>ii. Termination for a cause:</strong> Notwithstanding anything mentioned in this Agreement, the
        Firm may terminate this agreement with Freelancer, with immediate effect by notice in
        writing (with reduced payment or without payment) in the event of a material breach of the
        terms and conditions by Freelancer herein, non-performance, misconduct, breach of the Firm
        Policy or upon conducting in a manner which is regarded by the Firm as prejudicial to its
        own interests or to the interests of its clients.
        <br>
        <br>The Firm reserves the right to terminate services as part of disciplinary action and on the
        grounds including and not limited to Non-cooperation & loss of interest in assignments,
        Absenteeism, Irregularity, Non-punctuality, Engaging in Criminal Activities, Non-adherence
        to the terms of this agreement, etc. besides material violation of any other clause.
        <br>
        <br><strong>B. Termination by Freelancer:</strong> Termination by Freelancer shall be subject to the
        satisfactory completion of all existing duties, obligations, and projects by Freelancer
        provided any intention of termination by Freelancer should be informed to Firm via
        notice 15 Business days prior.
        <br>
        <br><strong>C. Effect of Termination:</strong>
        <br>i. Upon termination, the Freelancer will inform the Firm of the status of any Service, in
        progress or completed, by the Freelancer. The Firm may require the Freelancer to deliver to
        the Firm any completed services and the Firm will pay the agreed-upon price for those
        services.
        <br>
        <br>ii. The Firm shall not withhold any agreed-upon payment for the completed Services
        provided and accepted before the end of the Agreement.
        iii. Termination or expiration of this Agreement shall not relieve the Freelancer of its
        obligations hereunder to maintain in confidence and not to use the Confidential Information
        received hereunder. Clause 6 & 7 on the responsibility to maintain the confidentiality, clause
        8 on Restrictive covenants and 14 on the Indemnity, and damages if any therein shall survive
        determination of this Agreement.
        <br>
        <br><strong>D. Continued Performance:</strong> To the extent that any portion of this Agreement or any SOW
        (Statement of Work) is not terminated for convenience or cause, Freelancer will continue
        performing that portion.
        <br>
        <br>
        <br><h3>11. REMEDY</h3>
        <br>
        <br>A. <strong>Breach of Confidentiality and Restrictive Covenants:</strong> Any unauthorized use or disclosure
        of Confidential Information or violation of the Restrictive Covenants shall constitute a
        material breach of this Agreement and will cause irreparable harm and loss to the Firm for
        which monetary damages may be an insufficient remedy. Therefore, in addition to any other
        remedy available, the Firm will be entitled to all available civil remedies, including:
        <br>
        <br>i. Temporary and permanent injunctive relief, restraining Freelancer or other legal entity
        acting in concert with Freelancer from any actual or threatened unauthorized disclosure or
        use of Confidential Information and
        <br>
        <br>ii. Temporary and permanent injunctive relief restraining the Freelancer from violating,
        directly or indirectly, the restrictions of the Restrictive Covenant in any capacity identified
        in Clause 8, supra, and restricting third parties from aiding and abetting any violations of the
        Restrictive Covenant; and
        <br>
        <br>iii. Compensatory damages, including actual loss from misappropriation and unjust
        enrichment, and any and all legal fees, including without limitation, all attorneys’ fees, court
        costs, and any other related fees and/or costs incurred by the Firm in enforcing this
        Agreement.
        <br>
        <br>B. <strong>Non Performance of Agreement:</strong> If Freelancer fails to perform services or deliver
        Deliverables or before the term given under this agreement or any other date fixed by the
        parties to the reasonable satisfaction of Firm, Firm may, by written notice to Freelancer,
        terminate all its obligations hereunder and that Firm shall be entitled to equitable relief,
        including an injunction.
        <br>
        <br>
        <br><h3>12. BLACKLISTING</h3>
        <br>
        <br>The Firm has the discretion to Blacklist the Freelancer for violation of any of the clauses as
        given in the agreement. Blacklisting shall mean the Firm shall refrain from any future association
        with the freelancer.
        <br>
        <br>
        <br><h3>13. DATA PRIVACY</h3>
        <br>
        <br>As a part of Freelancer’s background check, as well as during the course of the service with the
        Firm, The Firm may collect personal information, including but not limited to, the bank details,
        and such other personal data or information of the Freelancer as it may deem necessary for the
        purposes of the service provided. This will be treated as Confidential Information of a
        Freelancer and collecting, using, processing, storing, disposing off, and transferring such
        information shall only be related to the Freelance Agreement.
        <br>
        <br>
        <br><h3>14. DISPUTES</h3>
        <br>
        <br>A. The Parties shall use their best endeavors to settle amicably amongst themselves any and
        all disputes arising out of or in connection with this Agreement or the interpretation
        thereof. However, if not resolved by amicable settlement within 30 (thirty) days from the
        Dispute, the dispute shall be finally and conclusively determined by arbitration with a
        sole arbitrator appointed jointly by the Parties, in accordance with the Arbitration and
        Conciliation Act, 1996, for the time being in force.
        <br>
        <br>B. The arbitration shall be conducted in English, and the seat and venue for arbitration shall
        be Mumbai. Further, all other disputes arising out of or in connection with any of the
        matters set out in this Agreement, shall be subject to the exclusive jurisdiction of the
        Courts of Mumbai.
        <br>
        <br>C. The costs of the arbitration proceedings shall be borne equally by the Parties. However,
        each Party shall bear its own expenses in prosecuting or defending its claim. The
        arbitrator may impose costs in the event of a claim by a Party being frivolous,
        substantially, or without merit to reimburse the cost of the other party.
        <br>
        <br>
        <br><h3>15. INDEMNITY</h3>
        <br>
        <br>The firm would not be responsible for any legal action arising out of the work done by the
        freelancer. In the event that, the firm incur cost or damages arising out of legal action to the firm
        as a result of the freelancer’s work, the freelancer shall indemnify the work.
        <br>
        <br>
        <br><h3>16. MISCELLANEOUS</h3>
        <br>
        <br>A. <strong>Governing Law:</strong> This Agreement shall be governed by and construed in accordance with
        the laws of the State of Maharashtra.
        <br>
        <br>B. <strong>Independent Party:</strong> Nothing contained or implied under this Agreement makes one
        party agent or legal representative of the other party for any purpose nor does it create
        any joint venture or partnership between the parties.
        <br>
        <br>C. <strong>Precedence of this Contract:</strong> The rights and obligations provided by this Agreement
        shall take precedence over specific legends or statements associated with Confidential
        Information when received. And this Agreement takes precedence over all other earlier
        understandings and those in the near future between the parties hereto.
        <br>
        <br>D. <strong>Severability:</strong> If any provisions of this agreement is or is held invalid or unenforceable
        the remainder of this agreement shall nevertheless remain in full force and effect in all
        other circumstances.
        <br>
        <br>E. <strong>No Waiver:</strong> Failure to exercise, or any delay in exercising, any right or remedy provided
        under this Agreement or by law shall not constitute a waiver of that or any other right or
        remedy, nor shall it preclude or restrict any further exercise of that or any other right or
        remedy. No single or partial exercise of any right or remedy provided under this
        Agreement or by law shall preclude or restrict the further exercise of that or any other
        right or remedy.
        <br>
        <br>F. <strong>Counterparts:</strong> This Agreement may be executed in any number of counterparts, by
        original or facsimile signature, each of which shall be deemed to be an original and all
        counterparts took together will be deemed to constitute one and the same instrument.
        <br>
        <br>
        <br><strong>IN WITNESS WHEREOF THE PARTIES HAVE SET THEIR HANDS TO THIS
        AGREEMENT THROUGH THEIR RESPECTIVE REPRESENTATIVES ON THE DAY,
        MONTH AND YEAR MENTIONED HEREINABOVE.</strong>
        <br>
        <br>
        <img src="images/kaushiktrans.png" alt="test alt attribute" width="200" height="70" border="10" />
        
        
        <pre>
        Kaushik Iyengar                           '.$name.'
            Director
        </pre>
        
        ';
        
    $pdf->writeHTML($html, true, false, true, false, '');
    
    //Close and output PDF document
    // $pdf->Output('Freelancer Agreement.pdf', 'I');
    
    // $pdf->writeHTML($html, true, false, true, false, '');
    // $pdf->Output('..\\\Freelancer_Agreement_'.$freelancer_id.'.pdf', 'F');
    // $filename
    // $pdf->Output('C:\\wamp\\www\\blue-pen-backend\\api\\team\\freelancers\\agreements\\'.$role.'\\Freelancer_Agreement_'.$freelancer_id.'.pdf', 'F');  //this code is for localhost
    $pdf->Output('/home/bluepenc/public_html/api/team/freelancers/agreements/'.$role.'/Freelancer_Agreement_'.$freelancer_id.'.pdf', 'F');  //this code is for server
    // var_dump("agreement saved succesfully");
    // copy('../freelancer_agreements/Freelancer_Agreement_'.$freelancer_id.'.pdf', '../../hr/freelancer_agreements/Freelancer_Agreement_'.$freelancer_id.'.pdf');

    if($role == "technical")
    {

        $Update_Agree_Sent_Sql = "UPDATE `freelancers_map` SET  `technical_agreement_sent` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Agree_Sent_Query = mysqli_query($conn , $Update_Agree_Sent_Sql);

        if($Update_Agree_Sent_Query)
        {
            $message = "Technical Agreement Sent Successfully";
            $status = 200;
            mailer1($email, $freelancer_id, $name, $role);
        }
        else
        {
            $message = "Error";
        }
    }
    else if($role == "non_technical")
    {
        $Update_Agree_Sent_Sql = "UPDATE `freelancers_map` SET  `non_technical_agreement_sent` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Agree_Sent_Query = mysqli_query($conn , $Update_Agree_Sent_Sql);

        if($Update_Agree_Sent_Query)
        {
            $message = "Non Technical Agreement Sent  Successfully";
            $status = 200;
            mailer1($email, $freelancer_id, $name, $role);
        }
        else
        {
            $message = "Error";
        }
    }


    function mailer1($email, $id, $name, $role)
    {
        // var_dump('entered mailer');

        $to = $email;
        // var_dump($to);
        $output='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
            <head>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta name="x-apple-disable-message-reformatting" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title></title>
                <style type="text/css" rel="stylesheet" media="all">
                /* Base ------------------------------ */
                
                @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
                body {
                    width: 100% !important;
                    height: 100%;
                    margin: 0;
                    -webkit-text-size-adjust: none;
                }
                
                a {
                    color: #3869D4;
                }
                
                a img {
                    border: none;
                }
                
                
                
                .preheader {
                    display: none !important;
                    visibility: hidden;
                    mso-hide: all;
                    font-size: 1px;
                    line-height: 1px;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                }
                /* Type ------------------------------ */
                
                body,
                th {
                    font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                }
                
                h1 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 22px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h2 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h3 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 14px;
                    font-weight: bold;
                    text-align: left;
                }
                
                td,
                th {
                    font-size: 16px;
                }
                
                p,
                ul,
                ol,
                blockquote {
                    margin: .4em 0 1.1875em;
                    font-size: 16px;
                    line-height: 1.625;
                }
                
                p.sub {
                    font-size: 13px;
                }
                /* Utilities ------------------------------ */
                
                .align-right {
                    text-align: right;
                }
                
                .align-left {
                    text-align: left;
                }
                
                .align-center {
                    text-align: center;
                }
                /* Buttons ------------------------------ */
                
                .button {
                    background-color: #3869D4;
                    border-top: 10px solid #3869D4;
                    border-right: 18px solid #3869D4;
                    border-bottom: 10px solid #3869D4;
                    border-left: 18px solid #3869D4;
                    display: inline-block;
                    color: #FFF;
                    text-decoration: none;
                    border-radius: 3px;
                    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                    -webkit-text-size-adjust: none;
                    box-sizing: border-box;
                }
                
                .button--green {
                    background-color: #22BC66;
                    border-top: 10px solid #22BC66;
                    border-right: 18px solid #22BC66;
                    border-bottom: 10px solid #22BC66;
                    border-left: 18px solid #22BC66;
                }
                
                .button--red {
                    background-color: #FF6136;
                    border-top: 10px solid #FF6136;
                    border-right: 18px solid #FF6136;
                    border-bottom: 10px solid #FF6136;
                    border-left: 18px solid #FF6136;
                }
                
                @media only screen and (max-width: 500px) {
                    .button {
                    width: 100% !important;
                    text-align: center !important;
                    }
                }
                /* Attribute list ------------------------------ */
                
                .attributes {
                    margin: 0 0 21px;
                }
                
                .attributes_content {
                    background-color: #F4F4F7;
                    padding: 16px;
                }
                
                .attributes_item {
                    padding: 0;
                }
                /* Related Items ------------------------------ */
                
                .related {
                    width: 100%;
                    margin: 0;
                    padding: 25px 0 0 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .related_item {
                    padding: 10px 0;
                    color: #CBCCCF;
                    font-size: 15px;
                    line-height: 18px;
                }
                
                .related_item-title {
                    display: block;
                    margin: .5em 0 0;
                }
                
                .related_item-thumb {
                    display: block;
                    padding-bottom: 10px;
                }
                
                .related_heading {
                    border-top: 1px solid #CBCCCF;
                    text-align: center;
                    padding: 25px 0 10px;
                }
                /* Discount Code ------------------------------ */
                
                .discount {
                    width: 100%;
                    margin: 0;
                    padding: 24px;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #F4F4F7;
                    border: 2px dashed #CBCCCF;
                }
                
                .discount_heading {
                    text-align: center;
                }
                
                .discount_body {
                    text-align: center;
                    font-size: 15px;
                }
                /* Social Icons ------------------------------ */
                
                .social {
                    width: auto;
                }
                
                .social td {
                    padding: 0;
                    width: auto;
                }
                
                .social_icon {
                    height: 20px;
                    margin: 0 8px 10px 8px;
                    padding: 0;
                }
                /* Data table ------------------------------ */
                
                .purchase {
                    width: 100%;
                    margin: 0;
                    padding: 35px 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .purchase_content {
                    width: 100%;
                    margin: 0;
                    padding: 25px 0 0 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .purchase_item {
                    padding: 10px 0;
                    color: #51545E;
                    font-size: 15px;
                    line-height: 18px;
                }
                
                .purchase_heading {
                    padding-bottom: 8px;
                    border-bottom: 1px solid #EAEAEC;
                }
                
                .purchase_heading p {
                    margin: 0;
                    color: #85878E;
                    font-size: 12px;
                }
                
                .purchase_footer {
                    padding-top: 15px;
                    border-top: 1px solid #EAEAEC;
                }
                
                .purchase_total {
                    margin: 0;
                    text-align: right;
                    font-weight: bold;
                    color: #333333;
                }
                
                .purchase_total--label {
                    padding: 0 15px 0 0;
                }
                
                body {
                    background-color: #F4F4F7;
                    color: #51545E;
                }
                
                p {
                    color: #51545E;
                }
                
                p.sub {
                    color: #6B6E76;
                }
                
                .email-wrapper {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #FFCC33;
                }
                
                .email-content {
                    width: 100%;
                    margin: 0;
                    padding: 0;
            
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                /* Masthead ----------------------- */
                
                .email-masthead {
                    padding: 25px 0;
                    text-align: center;
                }
                
                .email-masthead_logo {
                    width: 94px;
                }
                
                .email-masthead_name {
                    font-size: 16px;
                    font-weight: bold;
                    color: #A8AAAF;
                    text-decoration: none;
                    text-shadow: 0 1px 0 white;
                }
                /* Body ------------------------------ */
                
                .email-body {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #FFFFFF;
                }
                
                .email-body_inner {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    -premailer-width: 570px;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #FFFFFF;
                }
                
                .email-footer {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    -premailer-width: 570px;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    text-align: center;
                    backgound-color: #ffcc33;
                }
                
                .email-footer p {
                    color: black;
                }
                
                .body-action {
                    width: 100%;
                    margin: 30px auto;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    text-align: center;
                }
                
                .body-sub {
                    margin-top: 25px;
                    padding-top: 25px;
                    border-top: 1px solid #EAEAEC;
                }
                
                .content-cell {
                    padding: 35px;
                }
                /*Media Queries ------------------------------ */
                
                @media only screen and (max-width: 600px) {
                    .email-body_inner,
                    .email-footer {
                    width: 100% !important;
                    }
                }
                
                @media (prefers-color-scheme: dark) {
                    body,
                    .email-body,
                    .email-body_inner,
                    .email-content,
                    .email-wrapper,
                    .email-masthead,
                    .email-footer {
                    background-color: #333333 !important;
                    color: #FFF !important;
                    }
                    p,
                    ul,
                    ol,
                    blockquote,
                    h1,
                    h2,
                    h3 {
                    color: #FFF !important;
                    }
                    .attributes_content,
                    .discount {
                    background-color: #222 !important;
                    }
                    .email-masthead_name {
                    text-shadow: none !important;
                    }
                }
                </style>
                <!--[if mso]>
                <style type="text/css">
                    .f-fallback  {
                    font-family: Arial, sans-serif;
                    }
                </style>
                <![endif]-->
            </head>
            <body>
            <table style="width:100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr style="background-color:#FFCc33">
                    <th align="center" width="auto" style="padding: 15px;">
                        <a href="https://bluepen.co.in" class="">
                        <img src="https://bluepen.co.in/images/logo.png"  title="" style="width:120px; height:auto"/>
                        </a>
                    </th>
                    
                    
                </tr>
                
            </table>
                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                    <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    
                        
                        
                        <!-- Email Body -->
                        <tr>
                        <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                <div class="f-fallback">
                                    <h1>Hey, '.$name.'</h1>
                                    <p>Greetings from Team <strong>Bluepen</strong>, Thank you for registering as a freelancer at <strong>Bluepen</strong>. You are selected and you freelancer ID is '.$id.'.</p>
                                    <br>
                                    <br>
                                    <p>PFA a copy of freelancing agreement between Bluepen and you. We will need a signed copy of the same as a confirmation from your side on the terms and conditions mentioned.</p>
                                    <br>
                                    <br>
                                    <p>For all the assignments given to you 2 times changes/modification will be included (for more info - <a href="https://bluepen.co.in/changes-policy">Changes Policy</a>) in the said amount and will have to be done by you. The complete payment will be given only after completing the whole project and approval of the client on the same. Kindly do the needful and send the signed copy as soon as possible to get you onboard.</p>
                                    <br>
                                    <p>Thanks,
                                        <br>Team Bluepen</p>
                                        <!-- Sub copy -->
                                        <table class="body-sub" role="presentation">
                                        
                                        </table>
                                    </div>
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                <td class="content-cell" align="center">
                    <p class="f-fallback sub align-center">&copy; 2020 Blue Pen . All rights reserved.</p>
                                    
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    </table>
                </body>
            </html>';
        $subject = "Freelance with BluePen";
        // var_dump($subject);
        $body = $output; 
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        // var_dump($subject);
        $mail = new PHPMailer;
        // var_dump('entered mailing function');
        $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        $mail->Host = 'mail.bluepen.co.in';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        // var_dump($mail->Host);
        $mail->Port = '465';								//Sets the default SMTP server port
        $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'squad@bluepen.co.in';					//Sets SMTP username
        $mail->Password = 'star@parivaar';					//Sets SMTP password
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 1;							//Sets connection prefix. Options are "", "ssl" or "tls"
        // $mail->From = 'kaushiknathagami14@gmail.com';					//Sets the From email address for the message
        $mail->FromName = 'Bluepen';				//Sets the From name of the message
        $mail->AddAddress($to, '');		//Adds a "To" address
        // $mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);							//Sets message type to HTML				
        $mail->Subject = $subject;				//Sets the Subject of the message
        $mail->Body = $body;				//An HTML or plain text message body
        
        $mail->addBcc("squad@bluepen.co.in");
        $mail->DKIM_domain = "bluepen.co.in";
        $mail->DKIM_private = "MIIEpQIBAAKCAQEAyFiJHzoagEmVG+v1QIF6WDWbl8GxeglRcVPtGFkXFbrCwgIi9sSi3YqQG41Dah29tA4d5vk7P/Eh1Drm0IJ/ULoL9MAaXWUgi8uYniw5AP1l4/KmeGT3dNi+b/tNNf5n8G2JlPga4Yrdmaf3aXAkwXwnUqMZLyqS8tO32RgD80hEZo2xVikQcnxYevdad5fNhrFBq05V15l6UVwVsjG/cMEdzPffTvz1G2PcO3XyknureoLHV3e0So4a7ZtAQdyrSWUMbiZQdIfww3M9SpO969qW7LfMjVIYS1hrppoab7+DTbihBc5q3RO3NSSGZ0LSnx2IrgBNcI4Lszlj9WRnIQIDAQABAoIBAGCBjWPWaEedqk7t5ZCyDg4JnK6IZgZkELAnflE5MQ6NjR1JTDBUXiObiHlNHckzFFt0ZWEKc0kEzYfe66pLAisPw4ydMNYGTZwpcZXXtYnNhlQ8YYYjFLRbZ7inc/TrXIQLL7frn38/lilbKKnIlFwDgymiWRJITsrbw3a2w8hfD/QpehsoJGoUa8nHx/IpvRhbK6iay7ZhGzCtYuJcjmNtu830XON21wJme3gAn10RtAPtmXPzh2V6bQSCMWEzFAhggnuTyBffiQE/bwOUC6jEX1Wo6ViDQMpmNOvtL7H8QNwk6NGoGShyUoZCKe0/88P2OPkdlTRX7P3+QXU5BsECgYEA7OskEiLzZEWpAJ4sDZ5l6xQ4aOR+d1r+54RoP55r4/eo7/kLDqeKIzT555Rg76PNWPvXO3l2MPbJBHO8cEEQqgmGb7H0ha03YXiWRhK95A3ULIl89Wlx+fOX9cNug56l1ycniUf+r0Mg4ibh0oZT9fuWlbTaZthfWQmnjPMZYokCgYEA2HtT99Qkq8akgWNewq8YJuNh+HYOgp/CPTe2vJ/bKYpmBpDFcB1/JGCCrHPMcnootLd4X8PJ+FnxQ0ewVNQ3f7N0On/Tyu1mCsPjxGfXagjXa/wgkQQp3pMektHrzAUfEPxPvabKQKMG6TG9rW/DAc/otNA1TC3kz+N//OIcmdkCgYEAmQCyZtQTg2pJXpDHunPVNh/03ijSU5p8jF/CQ3O4EZ1biL65GVmxqFMKITh98cVDVHgv48TpQ23dG/bydzxN2sIUBAZU+A+JeHU79z0bTTBxGeIgxQy4AsgCF0GDGZVXXL94lPvdyqn7jpG1vRPrHSzBbyVA9rI9wW6uuiQ0/KECgYEAgip1rLiEbDz+wUXsvoblsMxcJjdmNii1dHXBjN1ZvDqZai02allyD39wUx01u0e0niULXhmtoYUDSn8aiYco78IJivs9b/EawDJVC82cewdh8G4jbs7gFhLD+Wf7risOKPptQA2/4umjyCe+c0CWMsq+k6n1wh5+THnwhS+4HtECgYEAnykgbhZEpnC7FFO+I25+RsUSk9BWu4agufX/aaaPm6RMg6NIVF78yyaiaTFA78tLas+XPNmoeRI1u2ZV9kwTxvWGiSImEpvxVKfd/xkQuNtDMsNJpiqpRTdmz7kJ+MaUDuOvWGBKiabFQdh9ik4jiF7HOadRDrM38Bf9uawjm6g=";
        $mail->DKIM_selector = 'phpmailer';
        $mail->DKIM_passphrase = '';
        $mail->DKIM_identity = $mail->From = $mail->Username;

        // $welcome_letter = "freelancers/agreements/".$role."/Freelancer_Agreement_".$id.".pdf";
        $welcome_letter = "freelancers/agreements/".$role."/Freelancer_Agreement_".$id.".pdf";
        $mail->addAttachment($welcome_letter);
        $mail->From = $mail->Username;
        
        if($mail->Send())								//Send an Email. Return true on success or false on error
        {
            // echo 'Mail Sent Successfully';
            // echo '<script> setTimeout(function() { window.location = "../freelancerdetails.php?id='.$id.'"; }, 3000); </script>';
            // exit();
            // return;
            $message = "Agreement Sent Successfully";
        }
        else
        {
            // var_dump("mail failed id 0");
            // exit();
            // return;
            $message = "Agreement Sent Failed";
        }
        // var_dump("mail failed id 1");
        $message = "Mailer Failed";
    }

    echo json_encode(array(
        'message' => $message,
        'status' => $status,
        'welcome_letter' => $welcome_letter,
    ));
?>