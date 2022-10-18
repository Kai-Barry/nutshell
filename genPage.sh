for var in "${@}"
do
        COUNTER=$(($(od -A n -t d -N 1 /dev/urandom)%4))
        case $COUNTER in
                0) export OPENAI_API_KEY=1 && echo 1;;
                1) export OPENAI_API_KEY=2 && echo 2;;
                2) export OPENAI_API_KEY=3 && echo 3;;
                3) export OPENAI_API_KEY=4 && echo 4;;
        esac
        python3.10 genPages.py "$var"
done