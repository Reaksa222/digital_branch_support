
function updatePositionDropdown() {
    var branchSelect = document.getElementById("brunch");
    var positionSelect = document.getElementById("position");

    // Clear the current options in the "Position" dropdown
    positionSelect.innerHTML = "";

    // Define options for each branch
    var branchOptions = {

        "Marketing and Communication Department": [
            "Manager, Customer Care Center",
            "Staff of Customer Care Center, Evening Shift",
            "Staff, Customer Care Center",
            "Senior Staff, Customer Care Center",
            "Staff of Customer Care Center, Night Shift",
            "Call Center Officer",
            "Call Center",
            "Staff of Customer Care Center",
            "Head, Marketing and Communication Department",
            "Senior Staff, Marketing & Communication Unit",
            "Staff, Marketing Unit",
            "Creative Designer, Marketing Unit",
            "Staff, Marketing & Communication Unit",
            "Staff, Marketing & Communication Unit"
        ],
        "Audit Department": [
            "Head of Internal Audit Department",
            "Senior Officer Financial Audit Unit",
            "Senior Officer IT Audit Unit",
            "Senior Manager Operational Audit Unit",
            "Senior Officer Credit Audit Unit",
            "Manager Operational Audit Unit",
            "Senior Officer, Operational Audit Unit",
            "Officer, Operational Audit Unit",
            "Officer, Credit Audit Unit",
            "Officer, IT Audit Unit",
            "Officer, Financial Audit Unit",
        ],
        "IT Department": [
            "DIT",
            "User for Mobile App Web Services",
            "Senior Manager, IT Application Office",
            "Manager, IT Infrastructure Unit",
            "Manager, Banking Application Administration Unit",
            "Manager, Core Banking Development and Solution Unit",
            "Senior Staff, IT Support Unit",
            "Manager, Database Administration Unit",
            "Senior Staff, Core Banking Development and Solution Unit",
            "Senior Staff, IT Development Unit",
            "Manager, IT Project Management Unit",
            "Senior Staff, IT Server Administration Unit",
            "Senior Staff, IT Network Administration Unit",
            "Manager, IT Security Unit",
            "Staff, IT Project Management Unit",
            "Staff, IT Support Unit",
            "Staff, Database Administrator Unit",
            "Staff, IT Development Unit",
            "Staff, Core Banking Development & Solution Unit",
            "Staff, Banking Application Administration Unit",
            "Staff, System Administration Unit",
            "Staff, ESB & API Management Unit",
            "Senior Staff, ESB and API Management Unit",
            "Trainee, IT Support Unit",
            "Trainee, IT Security Operation Unit",
            "Trainee, IT Development Unit",
            "Clerk, Reporting Administration Unit",
            "Manager, Reporting Administration Unit",
            "Staff, IT Network Administration Unit",
            "Trainee, IT Security Testing Unit",
            "Trainee, IT Security Operation Unit"
        ],
        "Digital Banking Department": [
            "Head of Digital Banking Department",
            "Manager, Digital Products & Services Office",
            "Manager, Clearing-Settlement & Dispute Unit",
            "Officer, Clearing-Settlement & Dispute Unit",
            "Senior Officer, Card Production and Consumer Management Unit",
            "Officer, Card Production and Consumer Management Unit",
            "Officer, Card Production & Management Unit",
            "Senior Officer, Acquiring Services Unit",
            "Officer, Acquiring Services Unit",
            "Staff, Acquiring Service Unit",
            "Senior Officer, Digital Product & Program Management Unit",
            "Officer, Digital Product & Program Management Unit",
            "Manager, Digital Banking Support Office",
            "Officer, Technical Support & Project Implementation Unit",
            "Manager, Digital Application Development",
            "Senior Officer, Clearing-Settlement & Dispute Unit",
            "Staff, Digital Bill Pay Support Unit",
            "Officer, Digital Application Development Unit",
            "Clerk, Digital Quality Assurance Unit",
            "Trainee, Digital Application Development Unit",
            "Trainee, Digital Bill Pay Support Unit",
            "Clerk, Technical Support & Project Implementation Unit",
            "Trainee, Card Production & Management Unit",
            "Senior Officer, Technical Support & Project Implementation Unit",
            "Manager, ATM Network & Digital Branch support office",
            "Senior Officer, Digital Terminal Management Unit",
            "ATM Support Officer, Channel Banking Unit",
            "ATM Support Officer, Digital Terminal Management Unit",
            "Manager Card Payment Unit",
            "Officer, Card Payment Support Unit",
            "Senior Channel Banking",
            "Senior Officer, ATM Performance Management Unit",
            "Officer, ATM Network Support Unit"
        ],
        "Retail": [
            "Head, Retail Division",
            "Senior Staff Retail Banking System Support Unit",
            "Senior Branch Service Processing Officer",
            "Staff, Retail Process Management Unit",
            "Senior Staff, Retail Performance Management Unit",
            "Staff, Retail Network Expansion Unit",
            "Senior Staff, Retail Customer Information Management Unit",
            "Staff Retail Service Processing Unit",
            "Senior Manager, Retail Process Management Unit",
            "Branch Service Processing Officer",
            "Senior Manager, Retail Network Expansion Unit",
            "Sale Officer",
            "Account and Administrator",
            "Senior Staff, Digital Retail Channels Unit",
            "Staff, Retail Customer Information Management unit",
            "Staff, Retail system supports unit",
            "Staff, Retail Network Administrator Unit",
            "Clerk, Digital Retail Channels Unit",
            "Clerk, Service Quality Unit",
            "Staff, Retail Product Development Unit",
            "Valunteer",
            "Retail Product & Performance Management Department"
        ],


        "Accounting and Finance Department": [

            "Accountant officer",
            "Accounting Staff",
            "Manager, Reconciliation Fixed Assets & Taxation Unit",
            "Senior Staff, Payment & Book Keeping Unit",
            "Devision Chief Accounting",

            "Head of Accounting and Finance Department",
            "Staff, Settlement Unit",
            "Deputy Head, Accounting & Finance Department",

            "Senior Staff, Reconciliation Fixed Assets & Taxation Unit",

            "Accountant",
            "Clerk, Filling Clerk",
            "Staff, Reconciliation Fixed Assets & Taxation Unit",
            "contractor",
            "Staff, Payment & Book Keeping Unit",
            "Clerk, Settlement Unit"
        ],
        "Management Information System": [
            "Senior Staff, Regulatory Reporting unit",
            "Manager. Regurarory Reporting Unit",
            "Manager, Planning & Reporting Office",
            "Manager, Financial Planning & Analysis Unit",
            "Staff, Financial Planning & Analysis Unit",
            "Staff, Regulatory Reporting unit"
        ],
        "TREASURY": [
            "Treasury Unit Manager",
            "Treasury Officer",
            "Senior Staff, FX & Treasury Dealing Unit",
            "Staff, FX & Treasury Dealing Unit"
        ],
        "SUPPORT-OPS": [
            "Staff, Local Transfer Unit",
            "Kramounsar Branch",
            "Senior Staff of Operation Support",
            "Manager, Cash Management unit",
            "Inter-Bank Staff",
            "Assistant Clearing House and Teller",
            "Senior Staff of Clearing House",
            "Clearing House Staff",
            "Staff of Operation Support",
            "Staff, Clearing check Unit",
            "Staff, Cash Managerment Unit",
            "Manager, Clearing House Office",
            "Clerk, Cash Management Unit"
        ],
        "AMB Branch": [
            "Senoir Teller",
            "Branch Manager",
            "Credit Officer",
            "Senior Teller"
        ],
        "Sen Sok Branch": [
            "Branch Manager",
            "Senoir Teller",
            "MSokphavan",
            "Clerk Branch Relationship Officer",
            "Branch Relationship Officer",
            "Teller",
            "Credit Officer",

            "Branch Operation Officer",
            "Senior SME Officer"
        ],
        "KMS BRANCH": [
            "Branch Manager",
            "Senior Supervisor, Deposit Relationship Unit",
            "Deputy Branch Manager",
            "Senior Customer Service Officer",
            "Senior Teller",
            "Customer Service Officer",
            "Teller Supervisor",
            "Senior VIP Relationship Executive",
            "Teller",
            "Branch Operation Officer",
            "Credit Officer",
            "Senior Credit Officer",
            "Clerk, Customer Service"
        ],
        "Bak Touk Branch": [
            "Chief Teller",
            "Deposit Relationship Executive",
            "Teller",
            "Senior Customer Service Officer",
            "Customer Service Officer",
            "Senior Teller Bak Touk Branch",
            "Senior Branch Manager",
            "Deputy Branch Manager",
            "Senior Credit Officer",
            "Credit Officer",
            "Branch Operation Officer"
        ],
        "Hengly Branch": [
            "Teller",
            "Customer Service Officer",
            "Senoir Teller",
            "VIP Relationship Manager",
            "Branch Manager",
            "Senior Customer Service Officer",
            "Branch Operation Officer",
            "Credit Officer",
            "Supervisor Credit Officer"
        ],
        "Orkide 2004 Branch": [
            "Teller",
            "Senior Customer Service Officer",
            "Customer Service Officer",
            "Branch Manager",
            "Senior Teller",
            "Credit Officer",
            "Senior Credit Officer",
            "Branch Operation Officer",
            "SME Officer"
        ],
        "Takhmao Branch": [
            "Branch Manager",
            "Senior Teller",
            "Customer Service Officer",
            "Senior Branch Relationship Officer",
            "Teller",
            "Clerk, Branch Operation",
            "Senior Credit Officer",
            "Credit Officer"
        ],
        "Royal University of Phnom Penh Branch": [
            "Teller",
            "Branch Manager",
            "Customer Service Officer",
            "Senior Teller",
            "Senior Customer Service Officer"
        ],
        "Chbar Ampov Branch": [
            "Senior Teller",
            "Customer Service Officer",
            "Teller Officer",
            "Teller",
            "Branch Manager",
            "Credit Officer",
            "Senior Credit Officer",
            "Clerk, Branch Operation"
        ],
        "Samdechpan Branch": [
            "Branch Relationship Officer",
            "Teller",
            "Teller Head SDP",
            "Teller Officer",
            "Staff ID zero eight zero eight",
            "Branch Manager",
            "Senior Branch Relationship Officer",
            "BRO",
            "Senoir Teller",
            "Deputy Branch Manager",
            "Branch Operation Officer",
            "Senior Branch Operation Officer",
            "Senior Credit Officer"
        ],
        "SHV Pshar Ler BRANCH": [
            "Teller",
            "Branch Manager",
            "Senior Customer Service Officer",
            "Teller Head SHV",
            "Action Senior Teller",
            "Senior Credit Officer",
            "Senior Branch Operation Officer",
            "Credit Officer"
        ],
        "SHV Port Branch": [
            "Senior Teller",
            "Branch Operation Office",
            "Teller",
            "Counter Supervisor",
        ],

        "Mao Tse Toung Branch": [
            "Senior Teller",
            "Senior Customer Service Officer",
            "Customer Service Officer",
            "Branch Manager",
            "Teller",
            "Credit Officer",
            "Branch Operation Officer"
        ],
        "Phnom Penh Port Branch": [
            "Teller Officer",
            "Acting Branch Manager",
            "Teller",
            "Senior Teller",
            "Counter Supervisor",
            "Senior Branch Relationshop Officer",
            "Branch Operation Officer"
        ],
        "Siem Reap Branch": [
            "Branch Operation Officer",
            "Teller",
            "Customer Service Officer",
            "Senior Customer Service Officer",
            "Branch Manager",
            "Senior Teller",
            "Senior Branch Operation Officer",
            "Credit Officer",
            "Senior Credit Officer",
            "Supervisor Credit Officer"
        ],
        "Toulkork Branch": [
            "TK Branch manager",
            "Senior Teller Officer",
            "Teller",
            "VIP Relationship Manager",
            "Customer Service Officer",
            "Teller (Weekend Shift)",
            "Senior Customer Service Officer",
            "Senior Teller",
            "Acting Senior Teller",
            "Branch Operation Officer",
            "Credit Officer",
            "Senior Credit Officer"
        ],
        "Battambank Branch": [
            "Supervisor Credit Officer",
            "Regional Manager",
            "Senior Teller",
            "Branch Operation Officer",
            "Senior Customer Service Officer",
            "Customer Service Officer",
            "Supervisor, Deposit Relationship Unit",
            "Teller",
            "Senior Credit Officer",
            "Credit Officer",
            "SME Officer"
        ],
        "Phsa Thmey Branch": [
            "Senior Teller",
            "Teller",
            "Branch Operation Officer",
            "Counter Supervisor"
        ],
        "KampongCham Branch": [
            "Branch Operation Officer",
            "Customer Service Officer",
            "Teller Officer",
            "Branch Manager",
            "Senior Teller",
            "Senior Customer Service Officer",
            "Senior Credit Officer",
            "Credit Officer"
        ],

        "LEGAL": [
            "Head of Legal-Compliance",
            "Senior Legal Officer",
            "Senior Staff, of Legal Affairs Unit",
            "Staff, of Legal Affairs Unit",
            "Senior Compliance Officer"
        ],

        "COMPLIANT": [
            "Manager, Compliance Unit",
            "Staff, Compliance Unit",
            "Senior Compliance Officer",
            "Senior Manager, Compliance Unit"
        ],

        "Priority Credit Client Office": [
            "Manager, Priority Credit Client Unit"
        ],

        "Collection & Recovery Office": [
            "Senior Staff, Collection & Recovery Unit",
            "Staff, Collection & Recovery Unit",
        ],

        "Credit Administration Office": [
            "Chief, Credit Administration Unit",
            "Manager, Credit Administration Office",
            "Senior Staff, Credit Admin & Credit Documentation Unit",
            "Staff, Credit Admin & Credit Documentation Unit",
            "Senior Staff, Portfolio MIS Analytic & Security Registration Unit"
        ],

        "FI & Corporate Banking Department": [
            "Deputy Head, FI & Corporate Banking Department",
            "Senior Manager, Public Entities & SoE Relations Office",
            "Manager, Trade Sales And Transaction Products Office",
            "Manager, Corporate Deposit Officer",
            "corporate Deposit Relationship Manager",
            "Corporate Relationship Manager",
            "Manager, SME & Consumer Banking II Office",
            "Corporate Lending Relationship Executive",
            "Relationship Executive Public Entities & SoE Relations",
            "Senior Relationship Executive-Corporate Lending",
            "Senior Relationship Executive-Corporate Deposit",
            "Corporate Officer",
            "Credit Officer",
            "Senior Relationship Manager-Corporate",
            "Senior Corporate Officer",
            "Relationship Manager-Corporate Lending & Financial Services"
        ],

        "Business Division": [
            "Head, Business Division",
            "Advisor, Business Division"
        ],
        "SME & Consumer Banking Department": [
            "Head, SME & Consumer Banking Department",
            "Manager, Credit Administration Office",
            "Manager, SME & Consumer Banking II Unit",
            "Senior Staff, SME & Consumer Banking l Unit",
            "Senior Credit Officer",
            "Credit Officer",
            "Senior Staff, SME & Consumer Banking II Unit",
            "Senior Staff, SME & Consumer Banking I Unit"
        ],

        "Human Resource": [
            "Bank's Advisor",
            "Manager, Human Resources Office",
            "Manager, Talent Acquisition Unit",
            "Senior Manager, Payroll & Performance Management Unit",
            "Manager, Employee Relations Unit",
            "Senior Staff, Learning & Development Unit",
            "Recruitment Officer",
            "Senior Staff, Talent Acquisition Unit",
            "Staff, Payroll & Performance Management Unit",
            "Staff, Learning & Development Unit",
            "Staff, Employee Relations Unit",
            "Senior Manager, Learning & Development Unit",
            "Clerk, Employee Relations Unit",
            "Trainee, Talent Acquisition Unit",
            "Clerk, Performance Management Unit"
        ],

        "Operational Risk": [
            "Operational Risk Management Office Manager",
            "Administration Risk Officer",
            "Staff, Operation Risk Management Unit"
        ],

        "INTERNATIONAL": [
            "Acting Head of International Department",
            "Senior Manager, Trade Finance Unit",
            "Staff, Remittance Unit",
            "Senior Staff, Remittance Unit",
            "Senior Staff, Trade Finance Unit",
            "Staff, Reconciliation Unit",
            "Senior Staff of International Department",
            "Staff of Trade Finance Unit"
        ],

        "MANAGEMENT": [
            "Chairman",
            "Vice Chairman",
            "Chief Operation Officer",
            "Chief Executive Officer",
            "Chief Business Officer",
            "Executive Assistance to CEO",
            "Secretary of Chairman",
            "Chief Finance Officer"
        ],

        "ADMIN": [
            "Head of Administration Department",
            "Manager, Administration Affair Office",
            "Senior Staff, General Logistic Unit",
            "Clerk, General Logistic Unit",
            "Staff, Engineering Unit",
            "Senior Engineering Officer",
            "Senior Staff, Procurement & Assets Management Unit",
            "Clerk, Engineering Unit",
            "Staff, Administration Affair Unit",
            "Receptionist, Administration Affair Unit",
            "Clerk, Procurement & Assets Management Unit"
        ],

        "Business Development": [
            "Head, Business Development Department",
            "Manager, Merchant Acquisition Unit",
            "Staff, Ecommerce Telesales Unit",
            "Senior Staff, Business Development Support Unit",
            "Clerk, Merchant Acquisition Unit",
            "Staff, Merchant Acquisition Unit"
        ],

        "VIP BANKING": [
            "Head of VIP Banking",
            "Senior VIP Relationship Executive",
            "VIP Relationship Manager",
            "Chief of VIP Sales",
            "Manager, Branch VIP RM Officer",
            "VIP Relationship Executive"
        ]

    };
    var selectedBranch = branchSelect.value;

    if (selectedBranch in branchOptions) {
        // Populate the "Position" dropdown with options for the selected branch
        for (var i = 0; i < branchOptions[selectedBranch].length; i++) {
            var option = document.createElement("option");
            option.text = branchOptions[selectedBranch][i];
            positionSelect.add(option);
        }
    }
}

updatePositionDropdown();
