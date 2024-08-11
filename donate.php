        <?php require_once 'include/header.php' ?>

        <section class="promo-area" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="promo-wrap">
                            <h1 class="promo-title"><span>Donation</span></h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Donation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="donations-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-intro intro-full">
                            <h2 class="section-title">Support us with <span class="color">Donation</span></h2>
                            <p class="text-center ">We have a strong Donation team to help the helpless.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="bg-light donation-form rounded-3 shadow-sm">
                            
                            <form class="donate-form p-4" action="" method="POST">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" name="name" required>
                                </div>
                                <div class="form-group half-form">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group half-form">
                                    <label for="number">Phone</label>
                                    <input class="form-control" type="number" id="number" name="number" required>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="email">Funding For</label>
                                    <select name="fund">
                                        <option value="Educate Children" selected>Food Campaign</option>
                                        <option value="Educate Children">Educate Children</option>
                                        <option value="Child Camps">Campaign for Old</option>
                                        <option value="Clean Water for Life">Clean Water</option>
                                        <option value="Campaign for Child Poverty">Campaign for Women</option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="email">Funding Amount</label>
                                    <div class="donation-amount position-relative">
                                        <span class="currency-sign position-absolute"><span class="naira">N</span></span>
                                        <input type="text" value="300" name="donate_amount" id="donate_amount" placeholder="Amount" class="donate-input form-control">
                                    </div>
                                </div>
                                <div class="donate-actions my-4 mt-2 d-sm-flex justify-content-between">
                                    <button type="button" class="button-amount"><span class="naira">N</span><span class="amount-inner">10,000</span></button>
                                    <button type="button" class="button-amount active"><span class="naira">N</span><span class="amount-inner">20,000</span></button>
                                    <button type="button" class="button-amount"><span class="naira">N</span><span class="amount-inner">50,000</span></button>
                                    <button type="button" class="button-amount"><span class="naira">N</span><span class="amount-inner">100,000</span></button>
                                    <button type="button" class="button-amount">Custom</button>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message (optional)</label>
                                    <textarea rows="6" class="form-control" id="message" name="message"></textarea>
                                </div>
                                <button class="custom-btn mt-4" type="submit">Donate Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

        <?php require_once 'include/footer.php' ?>

