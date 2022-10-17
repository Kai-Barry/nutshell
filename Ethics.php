<?php
    $headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
    $footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <title>Ethics<?php
        echo $headerFile; ?>
        <h1 class="title">Ethics</h1>
        <div class="EthicsBox">
            <div class="EthicsMessage">
                <h4>
                    At In a Nutshell,
                    ethical considerations are of high importance to ensure the safest experience for our users.
                    As an educational tool, it is vital that In a Nutshell is ethically appropriate for children
                    and their personal and school research. 
                </h4>
                <h4>
                    Currently, popular search engines are not designed for children to easily comprehend and navigate.
                    Children can become overwhelmed by the results on their search pages and the content within a page.
                    This can make it difficult to understand as the writing is above their capabilities.
                    It has been found that “offering resources children can comprehend is essential”
                    to allow for a successful research experience for the children (Anuyah et al., 2020, p. 89).
                    In a Nutshell strives to become that resource for children. 
                </h4>
                <h4>
                    Alongside reading comprehension issues,
                    search engines also pose the threat of students
                    being exposed to inappropriate material and content.
                    This is also an issue that exists within In a Nutshell, however,
                    we have implemented various filtering mechanics to mitigate the risk of inappropriate content. 
                </h4>
                <h4>
                    The AI system we utilise to create the topic articles,
                    GPT-3 (Generative Pre-trained Transformer),
                    is a machine learning platform that can produce human-like text.
                    Through its extensive training through various datasets and sites,
                    GPT-3 has many different use cases, including text generation and text summarization.
                    We utilise these functions of GPT-3 to create each
                    individual article that is searched by our users.  
                </h4>
                <h4>
                    Through these ethical considerations,
                    In a Nutshell provides a safe space for children to explore and learn. 
                </h4>
                <div class="image">
                    <img id="nav-logo-1" src="/images/Logo 01- 600 x 600 px.png" alt="Navigation logo">
                </div>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
