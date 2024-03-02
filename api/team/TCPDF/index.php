<?php

error_reporting(0);
require_once('examples/tcpdf_include.php');



// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Bhavya Haria');
$pdf->setTitle('Freelancer Agreement');
// $pdf->setSubject('TCPDF Tutorial');
// $pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
// $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

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

// set some text to print
$txt = <<<EOD
TCPDF Example 002

Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;

// print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

$html = '<h1>HTML Example</h1>
Some special characters: &lt; € &euro; &#8364; &amp; è &egrave; &copy; &gt; \\slash \\\\double-slash \\\\\\triple-slash
<h2>List</h2>
List example:
<ol>
	<li><img src="images/logo_example.png" alt="test alt attribute" width="30" height="30" border="0" /> test image</li>
	<li><b>bold text</b></li>
	<li><i>italic text</i></li>
	<li><u>underlined text</u></li>
	<li><b>b<i>bi<u>biu</u>bi</i>b</b></li>
	<li><a href="http://www.tecnick.com" dir="ltr">link to http://www.tecnick.com</a></li>
	<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>
	<li>SUBLIST
		<ol>
			<li>row one
				<ul>
					<li>sublist</li>
				</ul>
			</li>
			<li>row two</li>
		</ol>
	</li>
	<li><b>T</b>E<i>S</i><u>T</u> <del>line through</del></li>
	<li><font size="+3">font + 3</font></li>
	<li><small>small text</small> normal <small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal</li>
</ol>
<dl>
	<dt>Coffee</dt>
	<dd>Black hot drink</dd>
	<dt>Milk</dt>
	<dd>White cold drink</dd>
</dl>
';

// output the HTML content
// $pdf->writeHTML($html, true, false, true, false, '');

$html='This Freelance Agreement, hereinafter known as the “Agreement”, is created on the '.date('d').'th day of
<strong>'.date('F').'</strong> '.date('Y').' by and between, and <strong>is Effective from Date '.date('d/m/y').'</strong>
<br>
<br>
<br><h3>1. PARTIES</h3>
<br><strong>Blue Pen</strong> a <strong>partnership firm</strong>, having its principal place of business at <strong>Unit 5088, Panalal
compound, Bhandup Industrial Estate, LBS marg, Bhandup West, Mumbai-400078</strong>, acting
through its partners <strong>Vinit Rasik Savla and Kaushik Srinivasan Iyengar</strong> (hereinafter referred to
as the “Firm” which expression shall, unless it is repugnant to the context or meaning thereof, be
deemed to mean and include their successors in interest, legal representatives, nominees and
permitted assigns), <strong>OF THE ONE PART</strong>;
<br>
<br>And
<br>
<br>Prathamesh Barik, <strong>Freelancer</strong> residing in/ office in Tunga Village, Powai, Mumbai 400059
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
his or
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
<div style="text-align:right">FREELANCER SIGNATURE</div>

<pre>
    Kaushik Iyengar                               Freelancer
      Co-founder
</pre>


';

$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('Freelancer Agreement.pdf', 'I');

// $pdf->writeHTML($html, true, false, true, false, '');
// $pdf->Output('C:\\wamp64\\www\\BluePen\\src\\admin\\TCPDF\\FreelancerAgreementDownloaded.pdf', 'F');
