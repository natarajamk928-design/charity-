<?php require_once 'includes/db.php'; require_once 'includes/auth.php';
$page_title='Home'; include 'includes/header.php';
$campaigns=$conn->query("SELECT c.*, COALESCE(SUM(d.amount),0) raised FROM campaigns c LEFT JOIN donations d ON d.campaign_id=c.id GROUP BY c.id ORDER BY c.id DESC LIMIT 6");
$total=$conn->query("SELECT COALESCE(SUM(amount),0) n FROM donations")->fetch_assoc()['n'];
?>
<section class="hero"><h1>Empowering Lives, Together</h1><p>Support verified causes, donate securely and follow how community contributions are being used.</p><a class="btn" href="donate.php">Donate Now</a> <a class="btn secondary" href="register.php">Join Us</a></section>
<div class="grid"><div class="card"><h3>Total Donations</h3><div class="stat">₹<?=number_format($total,2)?></div></div><div class="card"><h3>How You Can Help</h3><p>Donate money, contribute useful items or volunteer for community events.</p></div><div class="card"><h3>Transparent Records</h3><p>Donation history and campaign progress are stored in an organized database.</p></div></div>
<h2>Active Campaigns</h2><div class="grid"><?php while($c=$campaigns->fetch_assoc()): $pct=$c['goal']>0?min(100,($c['raised']/$c['goal'])*100):0; ?><div class="card campaign"><span class="pill">Campaign</span><h3><?=e($c['title'])?></h3><p><?=e($c['description'])?></p><div class="progress"><span style="width:<?=$pct?>%"></span></div><div class="small">₹<?=number_format($c['raised'],2)?> raised of ₹<?=number_format($c['goal'],2)?></div><a class="btn" href="donate.php?campaign=<?=$c['id']?>">Support</a></div><?php endwhile; ?></div>
<?php include 'includes/footer.php'; ?>
