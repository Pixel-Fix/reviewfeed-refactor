@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
     <div class="row">
         <div class="col-lg-12 box_general">
            <div class="text-left">
                {{ config('app.name') }} Privacy Policy
            <br><br>
            1.	We respect your privacy
            <br><br>
            1.1.	{{ config('app.name') }} respects your right to privacy and is committed to safeguarding the privacy of our customers and website visitors.  This policy sets out how we collect and treat your personal information.
            <br>
            1.2.	We adhere to the Australian Privacy Principles contained in the Privacy Act 1988 (Cth) and to the extent applicable, the EU General Data Protection Regulation (GDPR).
            <br>
            1.3.	"Personal information" is information we hold which is identifiable as being about you. This includes information such as your name, email address, identification number, or any other type of information that can reasonably identify an individual, either directly or indirectly.
            <br>
            1.4.	Please read this Privacy Policy carefully. If you do not agree with this Privacy Policy, please do not register or use this Website. Terms used in this Privacy Policy have the same meaning as they do in the Terms and Conditions, if not defined differently.
            <br>
            1.5.	You may contact us in writing at {{ env('APP_EMAIL') }} for further information about this Privacy Policy.
            <br><br>
            2.	What personal information is collected
            <br><br>
            2.1.	{{ config('app.name') }} will, from time to time, receive and store personal information you submit to our website, provided to us directly or given to us in other forms.
            <br>
            2.2.	You may provide basic information such as your name, phone number, address and email address to enable us to send you information, provide updates and process your product or service order.
            <br>
            2.3.	We may collect additional information at other times, including but not limited to, when you provide feedback, when you provide information about your personal or business affairs, change your content or email preference, respond to surveys and/or promotions, provide financial or credit card information, or communicate with our customer support.
            <br>
            2.4.	Additionally, we may also collect any other information you provide while interacting with us.
            <br><br>


            3.	How we collect your personal information
            <br><br>
            3.1	{{ config('app.name') }} collects personal information from you in a variety of ways, including when you interact with us electronically or in person, when you access our website and when we engage in business activities with you. We may receive personal information from third parties. If we do, we will protect it as set out in this Privacy Policy.
            <br>
            3.2	By providing us with personal information, you consent to the supply of that information subject to the terms of this Privacy Policy.
            <br><br>
            4.	How we use your personal information
            <br><br>
            4.1.	{{ config('app.name') }} may use personal information collected from you to provide you with information about our products or services. We may also make you aware of new and additional products, services and opportunities available to you.
            <br>
            4.2.	{{ config('app.name') }} will use personal information only for the purposes that you consent to. This may include to:
            <br>
            (a)	provide you with products and services during the usual course of our business activities;
            <br>
            (b)	administer our business activities;
            <br>
            (c)	manage, research and develop our products and services;
            <br>
            (d)	provide you with information about our products and services;
            <br>
            (e)	communicate with you by a variety of measures including, but not limited to, by telephone, email, sms or mail; and
            <br>
            (f)	investigate any complaints.
            <br>
            If you withhold your personal information, it may not be possible for us to provide you with our products and services or for you to fully access our website.
            <br>
            4.3.	We may disclose your personal information to comply with a legal requirement, such as a law, regulation, court order, subpoena, warrant, legal proceedings or in response to a law enforcement agency request.
            <br>
            4.4.	If there is a change of control in our business or a sale or transfer of business assets, we reserve the right to transfer to the extent permissible at law our user databases, together with any personal information and non-personal information contained in those databases.
            <br><br>
            5.	Disclosure of your personal information
            <br><br>
            5.1.	{{ config('app.name') }} may disclose your personal information to any of our employees, officers, insurers, professional advisers, agents, suppliers or subcontractors insofar as reasonably necessary for the purposes set out in this privacy policy.
            <br>
            5.2.	If we do disclose your personal information to a third party, we will protect it in accordance with this privacy policy.
            <br><br>

            6.	General Data Protection Regulation (GDPR) for the European Union (EU)
            <br><br>
            6.1.	{{ config('app.name') }} will comply with the principles of data protection set out in the GDPR for the purpose of fairness, transparency and lawful data collection and use.
            <br>
            6.2.	We process your personal information as a Processor and/or to the extent that we are a Controller as defined in the GDPR.
            <br>
            6.3.	We must establish a lawful basis for processing your personal information. The legal basis for which we collect your personal information depends on the data that we collect and how we use it.
            <br>
            6.4.	We will only collect your personal information with your express consent for a specific purpose and any data collected will be to the extent necessary and not excessive for its purpose. We will keep your data safe and secure.
            <br>
            6.5.	We will also process your personal information if it is necessary for our legitimate interests, or to fulfil a contractual or legal obligation.
            <br>
            6.6.	We process your personal information if it is necessary to protect your life or in a medical situation, it is necessary to carry out a public function, a task of public interest or if the function has a clear basis in law.
            <br>
            6.7.	We do not collect or process any personal information from you that is considered "Sensitive Personal Information" under the GDPR, such as personal information relating to your sexual orientation or ethnic origin unless we have obtained your explicit consent, or if it is being collected subject to and in accordance with the GDPR.
            <br>
            6.8.	You must not provide us with your personal information if you are under the age of 16 without the consent of your parent or someone who has parental authority for you. We do not knowingly collect or process the personal information of children.
            <br><br>
            7.	Your rights under the GDPR
            <br><br>
            7.1	If you are an individual residing in the EU, you have certain rights as to how your personal information is obtained and used. {{ config('app.name') }} complies with your rights under the GDPR as to how your personal information is used and controlled if you are an individual residing in the EU
            <br>
            7.2	Except as otherwise provided in the GDPR, you have the following rights:
            <br>
            (a)	to be informed how your personal information is being used;<br>
            (b)	access your personal information (we will provide you with a free copy of it);<br>
            (c)	to correct your personal information if it is inaccurate or incomplete;<br>
            (d)	to delete your personal information (also known as "the right to be forgotten");<br>
            (e)	to restrict processing of your personal information;<br>
            (f)	to retain and reuse your personal information for your own purposes;<br>
            (g)	to object to your personal information being used; and<br>
            (h)	to object against automated decision making and profiling.<br>
            <br>
            7.3	Please contact us at any time to exercise your rights under the GDPR at {{ env('APP_EMAIL') }}.
            <br>
            7.4	We may ask you to verify your identity before acting on any of your requests.
            <br><br>
            8.	   Security of your personal information
            <br><br>
            8.1.	{{ config('app.name') }} is committed to ensuring that the information you provide to us is secure. In order to prevent unauthorised access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure information and protect it from misuse, interference, loss and unauthorised access, modification and disclosure.
            <br>
            8.2.	Where we employ data processors to process personal information on our behalf, we only do so on the basis that such data processors comply with the requirements under the GDPR and that have adequate technical measures in place to protect personal information against unauthorised use, loss and theft.
            <br>
            8.3.	The transmission and exchange of information is carried out at your own risk. We cannot guarantee the security of any information that you transmit to us, or receive from us.  Although we take measures to safeguard against unauthorised disclosures of information, we cannot assure you that personal information that we collect will not be disclosed in a manner that is inconsistent with this Privacy Policy.
            <br><br>
            9.	Access to your personal information
            <br><br>
            9.1.	You may request details of personal information that we hold about you in accordance with the provisions of the Privacy Act 1988 (Cth), and to the extent applicable the EU GDPR. If you would like a copy of the information which we hold about you or believe that any information we hold on you is inaccurate, out of date, incomplete, irrelevant or misleading, please email us at {{ env('APP_EMAIL') }}.
            <br>
            9.2.	We reserve the right to refuse to provide you with information that we hold about you, in certain circumstances set out in the Privacy Act or any other applicable law.
            <br><br>
            10.	Complaints about privacy
            <br><br>
            10.1.	If you have any complaints about our privacy practices, please feel free to send in details of your complaints to {{ env('APP_EMAIL') }}. We take complaints very seriously and will respond shortly after receiving written notice of your complaint.
            <br><br>
            11.	Changes to Privacy Policy
            <br><br>
            11.1.	Please be aware that we may change this Privacy Policy in the future. We may modify this Policy at any time, in our sole discretion and all modifications will be effective immediately upon our posting of the modifications on our website or notice board. Please check back from time to time to review our Privacy Policy.
            <br><br>
            12.	Details – what you can expect
            <br><br>
            12.1.	When you visit our website – personal data
            <br><br>
            Here we will let you know what kind of information {{ config('app.name') }} may gather about you, how we may use and process this information, whether we disclose it to anyone, and the choices you have regarding our use of this information.
            <br>
            Please read the details carefully. If you do not agree with this Privacy Policy, please do not register or use this Website. Terms used in this Privacy Policy have the same meaning as they do in the Terms and Conditions, if not defined differently.
            <br>
            When you come to our website, we may collect certain information such as browser type, operating system, website visited immediately before coming to our site, etc. This information is used in an aggregated manner to analyse how people use our site, such that we can improve our service.
            <br>
            As a user of our Website you will be asked to provide us with personal data or personal information, such as your name, date of birth, address, email address, telephone number and payment details, for example during the registration process, the deposit process, the withdrawal process or when interacting with our Customer Service. We will use the data you provide to process your order. All information provided by you will be treated securely and strictly in accordance with the applicable data protection regulations.
            <br>
            We may validate your name, date of birth, address and other personal information supplied by you during these processes. Your concerns will be considered in accordance with statutory provisions. By registering and opening your Account you accept the conditions of this Privacy Policy and you consent to such checks being made.
            <br>
            To manage the services, we provide as well as for other purposes referred to in this Privacy Policy and our Terms and Conditions, your personal data - including name, date of birth, address, email address, telephone number, and payment details as well as other information or proof of identity, will be collected, transferred, used, stored and processed by us.
            <br>
            Any further transmission of this data will not take place, with exception of certain cases, where the transmission of the identity documents to companies, which are assigned validate your customer data is necessary.

            <br><br>
            12.2.	Cookies
            <br><br>
            To enable the working of certain functions during your visit to our website, we make use of cookies on various pages. Cookies are small text files that are stored on your device. We make use of certain cookies that are deleted after your browsing session (session cookies). Other cookies remain on your device and allow our business partners and us to read information we have written into the file. The second type of cookies are read by us on your next visit to our website (persistent cookies).
            <br>
            You may configure your browser so that you are informed about the use of cookies every time a website tries to write one to your device. Furthermore, you may decide to accept or decline every single cookie or to make certain exceptions. In case you choose not to accept some or all cookies from our website, you may experience impaired functionality on our website for features that require cookies.
            <br><br>
            12.3.	Google Analytics
            <br><br>
            This Website uses Google Analytics, a web analytics service provided by Google Inc. ("Google"). Google Analytics uses "cookies", which are text files placed on your computer, to help the Website analyse how users use the site. The information generated by the cookie about your use of the Website (including your IP address) will be transmitted to and stored by Google on servers in the United States. Using a method known as IP masking, website owners that use Google Analytics have the option to tell Google Analytics to shorten the IP-address inside of member states of the European Union or other member states of the Agreement on the European Economic Area and to only use this portion of the IP address, rather than the entire IP address. Only in exceptional cases the full IP-address will be transmitted to a Google server located in the United States and shortened there. Google will use this information for the purpose of evaluating your use of the Website, compiling reports on website activity for website operators and providing other services relating to website activity and Internet usage. Google will not associate your IP address with any other data held by Google. You may refuse the use of cookies by selecting the appropriate settings on your browser, however please note that if you do this you may not be able to use the full functionality of this Website. In addition, you may prevent Google from obtaining information generated by the cookie and related data about your use of the Website (including your IP-address) as well as the processing of this data by Google by downloading and installing the browser-plugin available here: https://tools.google.com/dlpage/gaoptout?h=en
            <br><br>
            12.4.	Third party sites
            <br><br>
            Our site may from time to time have links to other websites not owned or controlled by us. These links are meant for your convenience only. Links to third party websites do not constitute sponsorship or endorsement or approval of these websites. Please be aware that {{ config('app.name') }} is not responsible for the privacy practises of other such websites. We encourage our users to be aware, when they leave our website, to read the privacy statements of each and every website that collects personal identifiable information.
            <br>
            </div>
         </div>
         <!-- /col -->
     </div>
 </div>
 <!-- /container -->
@endsection
