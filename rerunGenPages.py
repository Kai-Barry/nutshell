import os
for filename in os.listdir("pages"):
    print(filename.split(".data")[0].replace(" ", "\\ "))
for filename in os.listdir("pages"):
    if ".data" in filename:
        os.remove("pages/" + filename)
        os.system("./genPage.sh " + filename.split(".data")[0].replace(" ", "\\ "))
