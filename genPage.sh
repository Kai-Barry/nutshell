COUNTER=$((RANDOM%2))
case $COUNTER in
        0) export OPENAI_API_KEY=1;;
        1) export OPENAI_API_KEY=1;;
esac
COUNTER=$((RANDOM%3))
case $COUNTER in
        0) export SERPAPI_KEY=1;;
        1) export SERPAPI_KEY=1;;
        2) export SERPAPI_KEY=1;;
esac
python3.10 genPages.py "$1"