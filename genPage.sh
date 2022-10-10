for var in "${@}"
do
        COUNTER=$(($(od -A n -t d -N 1 /dev/urandom)%4))
        case $COUNTER in
                0) export OPENAI_API_KEY=1 && echo 1;;
                1) export OPENAI_API_KEY=2 && echo 2;;
                2) export OPENAI_API_KEY=3 && echo 3;;
                3) export OPENAI_API_KEY=4 && echo 4;;
        esac
        COUNTER=$(($(od -A n -t d -N 1 /dev/urandom)%3))
        case $COUNTER in
                0) export SERPAPI_KEY=a1f0b96d76a0809f86c5b329dedda1b8b11869c0ac148fd67f085fa48861c021 && echo 1;;
                1) export SERPAPI_KEY=2f3b3a177216bcf79ad515111a7c60a8db9971bfe71e670a31f5614923a0bfae && echo 2;;
                2) export SERPAPI_KEY=51db6ed21e1bdb577f0d4f696df60d26fdd35a595031daa5516b9acffe62b290 && echo 3;;
        esac
        python3.10 genPages.py $var
done