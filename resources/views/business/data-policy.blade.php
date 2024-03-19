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
                            <h1 style="font-size: 26px; margin-bottom: 20px;text-align: center;">Data Policy</h1>


            <p style="margin-bottom: 30px;">Protecting your private information is our priority. This Statement of
                Privacy applies to happiibook.com, and happiibook LLC and governs data collection and usage. For the
                purposes of this Privacy Policy, unless otherwise noted, all references to happiibook LLC include
                happiibook.com, hapiverse, hapiverse and hapiverse.com. The hapiverse website is a Desk-top business and
                social geo-location interest based website and app site. By using the hapiverse website, you consent to
                the data practices described in this statement.</p>


            <h3 style="text-decoration: underline; font-size: 16px; text-align: start;">Collection of your Personal
                Information</h3>
            <p style="margin-bottom: 20px;">In order to better provide you with products and services offered, hapiverse
                may collect personally identifiable information, such as your:</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>First and Last Name</p>
                </li>
                <li>
                    <p>E-mail Address</p>
                </li>
                <li>
                    <p>Phone Number</p>
                </li>
                <li>
                    <p>Employer</p>
                </li>
            </ul>
            <p style="margin-bottom: 20px;">If you purchase hapiverse's products and services, we collect billing and
                credit card information. This information is used to complete the purchase transaction.</p>
            <p style="margin-bottom: 20px;">hapiverse may also collect anonymous demographic information, which is not
                unique to you, such as your:</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>Age</p>
                </li>
                <li>
                    <p>Gender</p>
                </li>
                <li>
                    <p>Race</p>
                </li>
                <li>
                    <p>Religion</p>
                </li>
                <li>
                    <p>Political Affiliation</p>
                </li>
                <li>
                    <p>- Household Income</p>
                </li>
            </ul>
            <p style="margin-bottom: 30px;">Please keep in mind that if you directly disclose personally identifiable
                information or personally
                sensitive data through hapiverse's public message boards, this information may be collected and
                used by others.</p>
            <p style="margin-bottom: 30px;">We do not collect any personal information about you unless you voluntarily
                provide it to us.
                However, you may be required to provide certain personal information to us when you elect to use
                certain products or services. These may include: (a) registering for an account; (b) entering a
                sweepstakes or contest sponsored by us or one of our partners; (c) signing up for special offers
                from selected third parties; (d) sending us an email message; (e) submitting your credit card or
                other payment information when ordering and purchasing products and services. To wit, we will
                use your information for, but not limited to, communicating with you in relation to services and/or
                products you have requested from us. We also may gather additional personal or non-personal information
                in the future.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Use of your
                Sharing Information with Third Parties</h3>
            <p style="margin-bottom: 20px;">hapiverse does not sell, rent or lease its customer lists to third parties.
            </p>
            <p style="margin-bottom: 20px;">hapiverse may, from time to time, contact you on behalf of external business
                partners about a
                particular offering that may be of interest to you. In those cases, your unique personally identifiable
                information (e-mail, name, address, telephone number) is not transferred to the third party.
                hapiverse may share data with trusted partners to help perform statistical analysis, send you email
                or postal mail, provide customer support, or arrange for deliveries. All such third parties are
                prohibited from using your personal information except to provide these services to hapiverse, and
                they are required to maintain the confidentiality of your information.
            </p>
            <p style="margin-bottom: 30px;">hapiverse may disclose your personal information, without notice, if
                required to do so by law or in the good faith belief that such action is necessary to: (a) conform to
                the edicts of the law or comply with legal process served on hapiverse or the site; (b) protect and
                defend the rights or property of hapiverse; and/or (c) act under exigent circumstances to protect the
                personal safety of users of
                hapiverse, or the public</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Tracking
                User Behavior</h3>
            <p style="margin-bottom: 30px;">hapiverse may keep track of the websites and pages our users visit within
                hapiverse, in order to
                determine what hapiverse services are the most popular. This data is used to deliver customized
                content and advertising within hapiverse to customers whose behavior indicates that they are
                interested in a particular subject area.</p>



            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">
                Automatically Collected Information</h3>
            <p style="margin-bottom: 30px;">Information about your computer hardware and software may be automatically
                collected by
                hapiverse. This information can include: your IP address, browser type, domain names, access
                times and referring website addresses. This information is used for the operation of the service, to
                maintain quality of the service, and to provide general statistics regarding use of the hapiverse
                website. </p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Use of
                Cookies
            </h3>
            <p style="margin-bottom: 20px;">
                One of the primary purposes of cookies is to provide a convenience feature to save you time. The
                purpose of a cookie is to tell the Web server that you have returned to a specific page. For
                example, if you personalize hapiverse pages, or register with hapiverse site or services, a cookie
                helps hapiverse to recall your specific information on subsequent visits. This simplifies the process
                of recording your personal information, such as billing addresses, shipping addresses, and so on.
                When you return to the same hapiverse website, the information you previously provided can be
                retrieved, so you can easily use the hapiverse features that you customized.</p>
            <p style="margin-bottom: 20px;">
                One of the primary purposes of cookies is to provide a convenience feature to save you time. The
                purpose of a cookie is to tell the Web server that you have returned to a specific page. For
                example, if you personalize hapiverse pages, or register with hapiverse site or services, a cookie
                helps hapiverse to recall your specific information on subsequent visits. This simplifies the process
                of recording your personal information, such as billing addresses, shipping addresses, and so on.
                When you return to the same hapiverse website, the information you previously provided can be
                retrieved, so you can easily use the hapiverse features that you customized.</p>
            <p style="margin-bottom: 30px;">You have the ability to accept or decline cookies. Most Web browsers
                automatically accept
                cookies, but you can usually modify your browser setting to decline cookies if you prefer. If you
                choose to decline cookies, you may not be able to fully experience the interactive features of the
                hapiverse services or websites you visit.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Security of
                your Personal Information</h3>
            <p style="margin-bottom: 10px;">hapiverse secures your personal information from unauthorized access, use,
                or disclosure.
                hapiverse uses the following methods for this purpose: </p>
            <p style="margin-bottom: 20px;">The following services are available on our Site:</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>SSL Protocol</p>
                </li>
                <li>
                    <p>VPN</p>
                </li>
            </ul>
            <p style="margin-bottom: 20px;">When personal information (such as a credit card number) is transmitted to
                other websites, it is
                protected through the use of encryption, such as the Secure Sockets Layer (SSL) protocol. </p>
            <p style="margin-bottom: 30px;">We strive to take appropriate security measures to protect against
                unauthorized access to or
                alteration of your personal information. Unfortunately, no data transmission over the Internet or any
                wireless network can be guaranteed to be 100% secure. As a result, while we strive to protect
                your personal information, you acknowledge that: (a) there are security and privacy limitations
                inherent to the Internet which are beyond our control; and (b) security, integrity, and privacy of any
                and all information and data exchanged between you and us through this Site cannot be
                guaranteed.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Right to
                Deletion</h3>
            <p style="margin-bottom: 20px;">Subject to certain exceptions set out below, on receipt of a verifiable
                request from you, we will</p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>Delete your personal information from our records; and</p>
                </li>
                <li>
                    <p>Direct any service providers to delete your personal information from their records.</p>
                </li>
            </ul>
            <p style="margin-bottom: 20px;">Please note that we may not be able to comply with requests to delete your
                personal information if it is necessary to: </p>
            <ul style="list-style-type: circle; margin-bottom: 20px;">
                <li>
                    <p>Complete the transaction for which the personal information was collected, fulfill the
                        terms of a written warranty or product recall conducted in accordance with federal
                        law, provide a good or service requested by you, or reasonably anticipated within the
                        context of our ongoing business relationship with you, or otherwise perform a contract
                        between you and us;
                    </p>
                </li>
                <li>
                    <p>Detect security incidents, protect against malicious, deceptive, fraudulent, or illegal
                        activity; or prosecute those responsible for that activity;</p>
                </li>
                <li>
                    <p>
                        Debug to identify and repair errors that impair existing intended functionality;
                    </p>
                </li>
                <li>
                    <p>
                        Exercise free speech, ensure the right of another consumer to exercise his or her right
                        of free speech, or exercise another right provided for by law;
                    </p>
                </li>
                <li>
                    <p>
                        Comply with the California Electronic Communications Privacy Act;
                    </p>
                </li>
                <li>
                    <p>
                        Engage in public or peer-reviewed scientific, historical, or statistical research in the
                        public interest that adheres to all other applicable ethics and privacy laws, when our
                        deletion of the information is likely to render impossible or seriously impair the
                        achievement of such research, provided we have obtained your informed consent;
                    </p>
                </li>
                <li>
                    <p>
                        Enable solely internal uses that are reasonably aligned with your expectations based on
                        your relationship with us;
                    </p>
                </li>
                <li>
                    <p>
                        Comply with an existing legal obligation
                    </p>
                </li>
                <li>
                    <p>
                        Otherwise use your personal information, internally, in a lawful manner that is
                        compatible with the context in which you provided the information.
                    </p>
                </li>

            </ul>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Children
                Under Thirteen</h3>
            <p style="margin-bottom: 30px;">hapiverse does not knowingly collect personally identifiable information
                from children under the
                age of thirteen. If you are under the age of thirteen, you must ask your parent or guardian for
                permission to use this website.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">
                Disconnecting your hapiverse Account from Third Party Websites</h3>
            <p style="margin-bottom: 20px;">You will be able to connect your hapiverse account to third party accounts.
            </p>
            <p style="margin-bottom: 30px; text-transform: uppercase;">BY CONNECTING
                YOUR HAPIVERSE ACCOUNT TO YOUR THIRD PARTY ACCOUNT, YOU
                ACKNOWLEDGE AND AGREE THAT YOU ARE CONSENTING TO THE
                CONTINUOUS RELEASE OF INFORMATION ABOUT YOU TO OTHERS (IN
                ACCORDANCE WITH YOUR PRIVACY SETTINGS ON THOSE THIRD PARTY SITES).
                IF YOU DO NOT WANT INFORMATION ABOUT YOU, INCLUDING PERSONALLY
                IDENTIFYING INFORMATION, TO BE SHARED IN THIS MANNER, DO NOT USE
                THIS FEATURE. You may disconnect your account from a third party account at any time. Users
                have a control panel settings option where they can disconnect. They also join these groups so
                they can unjoin.
            </p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">
                E-mail Communications</h3>
            <p style="margin-bottom: 20px;">From time to time, hapiverse may contact you via email for the purpose of
                providing
                announcements, promotional offers, alerts, confirmations, surveys, and/or other general
                communication.</p>
            <p style="margin-bottom: 30px;">If you would like to stop receiving marketing or promotional communications
                via email from
                hapiverse, you may opt out of such communications by Customers control who they connect with
                and they can block, delete, ghost or leave business and user groups. Basically, they can unfriend..</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">External
                Data Storage Sites</h3>
            <p style="margin-bottom: 30px;">We may store your data on servers provided by third party hosting vendors
                with whom we have
                contracted.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Changes to
                this Statement</h3>
            <p style="margin-bottom: 30px;">hapiverse reserves the right to change this Privacy Policy from time to
                time. We will notify you
                about significant changes in the way we treat personal information by sending a notice to the
                primary email address specified in your account, by placing a prominent notice on our website,
                and/or by updating any privacy information. Your continued use of the website and/or Services
                available after such modifications will constitute your: (a) acknowledgment of the modified Privacy
                Policy; and (b) agreement to abide and be bound by that Policy.</p>


            <h3 style="margin-bottom: 20px; text-decoration: underline; font-size: 16px; text-align: start;">Contact
                Information</h3>
            <p style="margin-bottom: 20px;">hapiverse welcomes your questions or comments regarding this Statement of
                Privacy. If you
                believe that hapiverse has not adhered to this Statement, please contact hapiverse at:</p>
            <p style="margin-bottom: 20px;">happiibook LLC</p>
            <p style="margin-bottom: 20px;">1940 S Bedford St. </p>
            <p style="margin-bottom: 20px;">Beverly Hills, California 90034</p>
            <p style="margin-bottom: 20px;"><a href="mailto:w.pryor@happiibook.com">w.pryor@happiibook.com</a></p>
            <p style="margin-bottom: 20px;">Telephone number:</p>
            <p style="margin-bottom: 20px;">424-249-0660</p>
            <p>Effective as of May 17, 2022</p>
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