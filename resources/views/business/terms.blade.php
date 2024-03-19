@php
$image='';
@endphp
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif
<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="user-img online">
                                    <img src="{{'http://127.0.0.1:8000/'.$image}}" alt="" class="user-img">
                                </div>
                            </div>
                            <h1 class="card-title" style="font-size: 26px; margin-bottom: 20px;text-align: center;">Terms and Condition</h1>


            <p style="margin-bottom: 20px;">These terms and conditions (the "Terms and Conditions") govern the use of <a
                    href="http://127.0.0.1:8000/">www.hapiverse.com</a> (the "Site"). This Site is owned and operated by
                hapiverse. This Site is a news or media website.</p>
            <p style="margin-bottom: 20px;">By using this Site, you indicate that you have read and understand these Terms and Conditions and agree
                to abide by them at all times.</p>
            <p style="margin-bottom: 30px; text-transform: uppercase;">THESE TERMS AND CONDITIONS CONTAIN A DISPUTE
                RESOLUTION CLAUSE THAT IMPACTS YOUR RIGHTS ABOUT HOW TO RESOLVE DISPUTES. PLEASE READ IT CAREFULLY.</p>


            <h3 style="text-decoration: underline; font-size: 16px; text-align: start;">Intellectual Property</h3>
            <p style="margin-bottom: 30px;">All content published and made available on our Site is the property of
                hapiverse and the Site's
                creators. This includes, but is not limited to images, text, logos, documents, downloadable files and
                anything that contributes to the composition of our Site.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Age
                Restrictions</h3>
            <p style="margin-bottom: 30px;">The minimum age to use our Site is 13 years old. By using this Site, users
                agree that they are over 13 years old. We do not assume any legal responsibility for false statements
                about age</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Acceptable
                Use</h3>
            <p style="margin-bottom: 20px;">As a user of our Site, you agree to use our Site legally, not to use our
                Site for illegal purposes, and not to:</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>Harass or mistreat other users of our Site;</p>
                </li>
                <li>
                    <p>Violate the rights of other users of our Site;</p>
                </li>
                <li>
                    <p>Violate the intellectual property rights of the Site owners or any third party to the Site;</p>
                </li>
                <li>
                    <p>Hack into the account of another user of the Site;</p>
                </li>
                <li>
                    <p>Act in any way that could be considered fraudulent; or</p>
                </li>
                <li>
                    <p>Post any material that may be deemed inappropriate or offensive</p>
                </li>
            </ul>
            <p style="margin-bottom: 30px;">If we believe you are using our Site illegally or in a manner that violates
                these Terms and Conditions, we reserve the right to limit, suspend or terminate your access to our Site.
                We also reserve the right to take any legal steps necessary to prevent you from accessing our Site</p>



            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">User
                Contributions</h3>
            <p style="margin-bottom: 20px;">Users may post the following information on our Site:</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>Items for sale;</p>
                </li>
                <li>
                    <p>Photos;</p>
                </li>
                <li>
                    <p>Videos; and</p>
                </li>
                <li>
                    <p>Public comments</p>
                </li>
            </ul>
            <p style="margin-bottom: 30px;">By posting publicly on our Site, you agree not to act illegally or violate
                these Terms and Conditions</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Accounts
            </h3>
            <p style="margin-bottom: 20px;">When you create an account on our Site, you agree to the following:</p>
            <ol style="margin-bottom: 20px;">
                <li>
                    <p>You are solely responsible for your account and the security and privacy of your account,
                        including passwords or sensitive information attached to that account; and</p>
                </li>
                <li>
                    <p>All personal information you provide to us through your account is up to date, accurate, and
                        truthful and that you will update your personal information if it changes</p>
                </li>
            </ol>
            <p style="margin-bottom: 30px;">We reserve the right to suspend or terminate your account if you are using
                our Site illegally or if you violate these Terms and Conditions.</p>

            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Sale of
                Services</h3>
            <p style="margin-bottom: 10px;">These Terms and Conditions govern the sale of services available on our
                Site.</p>
            <p style="margin-bottom: 20px;">The following services are available on our Site:</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>Subscription plans.</p>
                </li>
            </ul>
            <p style="margin-bottom: 20px;">The services will be paid for in full when the services are ordered.</p>
            <p style="margin-bottom: 20px;">These Terms and Conditions apply to all the services that are displayed on
                our Site at the time you access it. All information, descriptions, or images that we provide about our
                services are as accurate as possible. However, we are not legally bound by such information,
                descriptions, or images as we cannot guarantee the accuracy of all services we provide. You agree to
                purchase services from our Site at your own risk.</p>
            <p style="margin-bottom: 30px;">We reserve the right to modify, reject or cancel your order whenever it
                becomes necessary. If we cancel your order and have already processed your payment, we will give you a
                refund equal to the amount you paid. You agree that it is your responsibility to monitor your payment
                instrument to verify receipt of any refund.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Third Party
                Goods and Services</h3>
            <p style="margin-bottom: 30px;">Our Site may offer goods and services from third parties. We cannot
                guarantee the quality or accuracy of goods and services made available by third parties on our Site.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">User Goods
                and Services</h3>
            <p style="margin-bottom: 30px;">Our Site allows users to sell goods and services. We do not assume any
                responsibility for the goods and services users sell on our Site. We cannot guarantee the quality or
                accuracy of any goods and services sold by users on our Site. However, if we are made aware that a user
                is violating these Terms and Conditions, we reserve the right to suspend or prohibit the user from
                selling goods and services on our Site</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">
                Subscriptions</h3>
            <p style="margin-bottom: 20px;">Your subscription automatically renews and you will be automatically billed
                until we receive notification that you want to cancel the subscription.</p>
            <p style="margin-bottom: 30px;">To cancel your subscription, please follow these steps: User as 14 days to
                cancel and get full refund.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">
                Subscriptions</h3>
            <p style="margin-bottom: 20px;">We offer the following free trial of our services: A 7 day free trial that
                begins when users register for a new account. The free trial includes unlimited access to all documents
                available on our site</p>
            <p style="margin-bottom: 20px;">At the end of your free trial, the following will occur: You will
                automatically be billed our monthly subscription rate. If you do not want to be billed, you will need to
                cancel your subscription before your free trial ends.</p>
            <p style="margin-bottom: 30px;">To cancel your free trial, please follow these steps: Log in to your account
                and select "Cancel Free Trial" under the "Account Management" tab.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Payments
            </h3>
            <p style="margin-bottom: 20px;">We accept the following payment methods on our Site:</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>Credit Card.</p>
                </li>
                <li>
                    <p>Debit.</p>
                </li>
            </ul>
            <p style="margin-bottom: 20px;">When you provide us with your payment information, you authorize our use of
                and access to the payment instrument you have chosen to use. By providing us with your payment
                information, you authorize us to charge the amount due to this payment instrument.</p>
            <p style="margin-bottom: 30px;">If we believe your payment has violated any law or these Terms and
                Conditions, we reserve the right to cancel or reverse your transaction.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Consumer
                Protection Law</h3>
            <p style="margin-bottom: 30px;">Where any consumer protection legislation in your jurisdiction applies and
                cannot be excluded, these Terms and Conditions will not limit your legal rights and remedies under that legislation. These Terms
                and Conditions will be read subject to the mandatory provisions of that legislation. If there is a conflict between these Terms and Conditions and that legislation, the mandatory provisions of the legislation will apply.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Links to Other Websites</h3>
            <p style="margin-bottom: 30px;">Our Site contains links to third party websites or services that we do not own or control. We are not responsible for the content, policies, or practices of any third party website or service linked to on our Site. It is your responsibility to read the terms and conditions and privacy policies of these third party websites before using these sites.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Limitation of Liability</h3>
            <p style="margin-bottom: 30px;">hapiverse and our directors, officers, agents, employees, subsidiaries, and affiliates will not be liable for any actions, claims, losses, damages, liabilities and expenses including legal fees from your use of the Site</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Indemnity</h3>
            <p style="margin-bottom: 30px;">Except where prohibited by law, by using this Site you indemnify and hold harmless hapiverse and our directors, officers, agents, employees, subsidiaries, and affiliates from any actions, claims, losses, damages, liabilities and expenses including legal fees arising out of your use of our Site or your violation of these Terms and Conditions.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Applicable Law</h3>
            <p style="margin-bottom: 30px;">These Terms and Conditions are governed by the laws of the State of California.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Dispute Resolution</h3>
            <p style="margin-bottom: 20px;">Subject to any exceptions specified in these Terms and Conditions, if you and hapiverse are unable to resolve any dispute through informal discussion, then you and hapiverse agree to submit the issue before an arbitrator. The decision of the arbitrator will be final and binding. Any arbitrator must be a neutral party acceptable to both you and hapiverse</p>
            <p style="margin-bottom: 30px;">Notwithstanding any other provision in these Terms and Conditions, you and hapiverse agree that you
                both retain the right to bring an action in small claims court and to bring an action for injunctive relief
                or intellectual property infringement.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Severability</h3>
            <p style="margin-bottom: 30px;">If at any time any of the provisions set forth in these Terms and Conditions are found to be inconsistent or invalid under applicable laws, those provisions will be deemed void and will be removed from these Terms and Conditions. All other provisions will not be affected by the removal and the rest of these Terms and Conditions will still be considered valid.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Changes</h3>
            <p style="margin-bottom: 30px;">These Terms and Conditions may be amended from time to time in order to maintain compliance with the law and to reflect any changes to the way we operate our Site and the way we expect users to behave on our Site. We will notify users by email of changes to these Terms and Conditions or post a notice on our Site</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Contact Details</h3>
            <p style="margin-bottom: 20px;">Please contact us if you have any questions or concerns. Our contact details are as follows:</p>
            <p style="margin-bottom: 20px;"><a href="mailto:admin@happiibook.com">admin@happiibook.com</a></p>
            <p style="margin-bottom: 20px;">P.O. Box 4781 Lancaster, Ca. 93539</p>
            <p style="margin-bottom: 20px;">You can also contact us through the feedback form available on our Site.</p>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </section>
</div>
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.footer')
@else
    @include('business.layouts.footer')
@endif