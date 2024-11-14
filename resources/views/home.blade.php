<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="navbar">
        <h2 class="logo">Cyber Consultant</h2>
        <div class="option">
            <a href="home">Home</a>
            <a href="service">Service</a>
            <a href="updateprofile">Profile</a>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <div class="header">
        <div class="header-content">
            <h1>Best Cyber Security Consultant
            only in this website!</h1>
        </div>
    </div>
    <div class="content">
        <div class="contact">
            <div class="form">
                <div class="form-info">
                    <h2>Are you experiencing these cybersecurity challenges?</h2>
                    <li>Data Breaches and Unauthorized Access</li>
                    <li>Ransomware Attacks</li>
                    <li>Lack of Cybersecurity Awareness</li>
                    <li>Compliance and Regulatory Issues</li>
                </div>
                <div class="form-contact">
                    <p>Still struggling with securing sensitive data from breaches? Many companies face this challenge. Cyber Consultant provides strong encryption, access controls, and 24/7 monitoring to protect your data.</p>
                    <br>
                    <p>Outdated security systems leave you vulnerable to modern threats. Cyber Consultant upgrades your defenses with the latest technology, keeping your business protected.</p>
                </div>
            </div>
        </div>
        <div class="content-h1">
            <h1>What we can do!</h1>
        </div>
        <div class="card-container">
            <div class="card">
                <h3>Security Checkup</h3>
                <div class="card-content">
                    <img src="../img/security.jpg" alt="basic">
                    <p>We do a full scan of your company's systems to find weak spots where hackers might get in. Then, we fix those issues and put stronger security in place to keep your business safe.</p>   
                </div>
            </div>
            <div class="card">
                <h3>Round-the-Clock Protection</h3>
                <div class="card-content">
                    <img src="../img/clock.jpg" alt="premim">
                    <p>We watch your systems 24/7 for any signs of trouble, so if a hacker tries to break in, we can stop them before they cause damage.</p>     
                </div>
            </div>
            <div class="card">
                <h3>Employee Training</h3>
                <div class="card-content">
                    <img src="../img/teamwork.jpg" alt="corporate">
                    <p>We teach your staff how to avoid common security mistakes, like falling for phishing emails, so your team helps keep your business secure.</p>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <p>@2024 - Cyber Consultant</p>
</footer>
</html>