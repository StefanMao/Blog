
// --------------------------------------------------------------------------------------------------------------------
// 獨到每個方格數字之座標
function getPosition( pos ) {
    return 20 + pos * 120;
}
 
// --------------------------------------------------------------------------------------------------------------------
// 設置不同數字之背景顏色
function getNumberBackgroundColor(number) {
    switch (number) {
        case 2:
            return "#eee4da";
            break;
        case 4:
            return "#ede0c8";
            break;
        case 8:
            return "#f2b179";
            break;
        case 16:
            return "#f59563";
            break;
        case 32:
            return "#f67c5f";
            break;
        case 64:
            return "#f65e3b";
            break;
        case 128:
            return "#edcf72";
            break;
        case 256:
            return "#edcc61";
            break;
        case 512:
            return "#9c0";
            break;
        case 1024:
            return "#33b5e5";
            break;
        case 2048:
            return "#09c";
            break;
        case 4096:
            return "#a6c";
            break;
        case 3192:
            return "#93c";
            break;
    }
    return "black";
}
 
// --------------------------------------------------------------------------------------------------------------------
// 設置數字的顏色：2和4的颜色為#776e65，其它數字的颜色為白色
function getNumberColor(number) {
    if ( number <= 4 )
        return "#776e65";
    return "white";
}
 
// --------------------------------------------------------------------------------------------------------------------
// 判斷當前格子是否有數字
function nospace(board) {
    for ( var i = 0; i < 4; i++ )
        for ( var j = 0; j < 4; j++ )
            if ( board[i][j] == 0 ) // 如果没有數字，返回false
                return false;
    // 如果有數字，返回true
    return true;
}
 
// --------------------------------------------------------------------------------------------------------------------
/* 判斷能否向左移動
 * 1、只需要判断每一行的後3列格子。
 * 2、可以移动的条件是：
 *   ①當前格子有數字，即 board[i][j] != 0
 *   ②左邊格子没有數字，即 (board[i][j - 1] == 0
 *   ③左邊格子和当前格子数字相同，即 board[i][j - 1] == board[i][j]
 */
function canMoveLeft(board) {
    for (var i = 0; i < 4; i++)
        for (var j = 1; j < 4; j++)
            if (board[i][j] != 0)
                if (board[i][j - 1] == 0 || board[i][j - 1] == board[i][j])
                    return true;
    return false;
}
 
// --------------------------------------------------------------------------------------------------------------------
function canMoveUp(board) {
    for (var j = 0; j < 4; j++)
        for (var i = 1; i < 4; i++)
            if (board[i][j] != 0)
                if (board[i - 1][j] == 0 || board[i - 1][j] == board[i][j])
                    return true;
    return false;
}
function canMoveRight(board) {
    for (var i = 0; i < 4; i++)
        for (var j = 0; j < 3; j++)
            if (board[i][j] != 0)
                if (board[i][j+1] == 0 || board[i][j+1] == board[i][j])
                    return true;
    return false;
}
function canMoveDown(board) {
    for (var j = 0; j < 4; j++)
        for (var i = 0; i < 3; i++)
            if (board[i][j] != 0)
                if (board[i + 1][j] == 0 || board[i + 1][j] == board[i][j])
                    return true;
    return false;
}
 
// --------------------------------------------------------------------------------------------------------------------
// 判斷水平方向是否可移動，即當前格子之水平目標的两个格子之間没有其他数字 noBlockHorizontal
function noBlockHorizontal(row, col1, col2, board) {
    for (var i = col1 + 1; i < col2; i++)
        if (board[row][i] != 0) // 如果在這2者間的其它格子有数字，返回false
            return false;
    // 没數字，返回true
    return true;
}
 
// --------------------------------------------------------------------------------------------------------------------
// 判斷垂直方向是否可移動，即垂直方向的两個目標格子之間没有其他數字 noBlockHorizontal
function noBlockVertical(col, row1, row2, board) {
    for (var i = row1 + 1; i < row2; i++)
        if (board[i][col] != 0) // 如果有數字，返回false
            return false;
    // 没數字，返回true
    return true;
}
 
function nomove( board ){
    if( canMoveLeft( board ) ||
        canMoveRight( board ) ||
        canMoveUp( board ) ||
        canMoveDown( board ) )
        return false;
 
    return true;
}